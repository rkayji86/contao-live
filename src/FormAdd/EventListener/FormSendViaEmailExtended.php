<?php

namespace FormAdd\EventListener;

use Contao\Form;
use Contao\Controller;
use Contao\DataContainer;
use Contao\System;
use Contao\Database;

class FormSendViaEmailExtended
{

    protected static function formatMessageLine($arrLabels, $name, $value)
    {
        return (isset($arrLabels[$name]) ? $arrLabels[$name] : ucfirst($name)) . ': ' . (is_array($value) ? implode(', ', $value) : $value);
    }

    protected static function generateMessage($arrSubmitted, $arrLabels, $form)
    {
        $message = array();
        $fields = self::getFormFields($form, false);
        $fieldsOrdered = @deserialize($form->messageFieldsOrder);
        if (is_array($fieldsOrdered)) {
            foreach ($fieldsOrdered as $field) {
                $field = (int) $field;
                $name = array_key_exists($field, $fields) ? $fields[$field] : false;
                if ($name) {
                    if (array_key_exists($name, $arrSubmitted)) {
                        $value = deserialize($arrSubmitted[$name]);
                        if ($form->skipEmpty && !is_array($value) && !strlen($value)) {
                            continue;
                        }

                        $message[] = self::formatMessageLine($arrLabels, $name, $value);
                    }
                }
            }
        } else {
            foreach ($arrSubmitted as $name => $value) {
                $value = deserialize($value);
                if ($form->skipEmpty && !is_array($value) && !strlen($value)) {
                    continue;
                }

                $message[] = self::formatMessageLine($arrLabels, $name, $value);
            }
        }
        return implode("\n", $message);
    }

    public static function prepareFormData($arrSubmitted, $arrLabels, $arrFields, $form)
    {

        if ($form->sendViaEmail) {
            $keys = array();
            $values = array();
            $fields = array();
            $message = '';

            foreach ($arrSubmitted as $k => $v) {
                if ($k == 'cc') {
                    continue;
                }

                $v = deserialize($v);

                // Skip empty fields
                if ($form->skipEmpty && !is_array($v) && !strlen($v)) {
                    continue;
                }

                // Prepare XML file
                if ($form->format == 'xml') {
                    $fields[] = array(
                        'name' => $k,
                        'values' => (is_array($v) ? $v : array(
                            $v
                        ))
                    );
                }

                // Prepare CSV file
                if ($form->format == 'csv') {
                    $keys[] = $k;
                    $values[] = (is_array($v) ? implode(',', $v) : $v);
                }
            }

            $message = self::generateMessage($arrSubmitted, $arrLabels, $form);
            $recipients = \StringUtil::splitCsv($form->recipient);

            // Format recipients
            foreach ($recipients as $k => $v) {
                $recipients[$k] = str_replace(array(
                    '[',
                    ']',
                    '"'
                ), array(
                    '<',
                    '>',
                    ''
                ), $v);
            }

            $email = new FormSendViaEmailExtendedEmail();

            // Get subject and message

            //if ($arrSubmitted['message']) {
            //    $message = $arrSubmitted['message'];
            //}
            if ($arrSubmitted['subject']) {
                $email->subject = $arrSubmitted['subject'];
            }

            // Absender-E-Mail-Adresse festlegen
            $fromAddress = '';
            if ($form->useFieldAsFromAddress) {
                // Feldname aus der Datenbank extrahieren
                $result = $form->Database->prepare('SELECT `name` FROM `tl_form_field` WHERE `id` = ?')->execute($form->fromAddressField);

                if ($result && $result->next()) {
                    // Wert aus dem Feldnamen als From benutzen
                    $fromAddress = \Input::post($result->name);
                }
            } else {
                // Festgelegte Absender-E-Mail-Adresse als From benutzen
                $fromAddress = $form->fromAddress;
            }

            // Falls wider Erwarten keine Absender-E-Mail-Adresse vorhanden ist
            // E-Mail-Adresse des Administrators als Fallback benutzen
            if ('' === trim($fromAddress)) {
                $fromAddress =  $GLOBALS['TL_ADMIN_EMAIL'];
            }

            $email->from = $fromAddress;

            // Absender-E-Mail-Name festlegen
            $fromName = '';
            if ($form->useFieldAsFromName && '' !== trim($form->fromNameField)) {
                // IDs der referenzierten Felder extrahieren
                $fromNameFieldIds = @unserialize($form->fromNameField);

                if (is_array($fromNameFieldIds)) {
                    // Zur Sicherheit (Stichwort SQL-Injection) Integer aus den Ids machen
                    foreach (array_keys($fromNameFieldIds) as $fromNameFieldIdKey) {
                        $fromNameFieldIds[$fromNameFieldIdKey] = (int) $fromNameFieldIds[$fromNameFieldIdKey];
                    }

                    // Feldnamen aus der Datenbank extrahieren
                    $result = $form->Database->prepare('SELECT `id`, `name` FROM `tl_form_field` WHERE `id` IN (' . implode(', ', $fromNameFieldIds) . ')')->execute();

                    if ($result) {
                        $fromNameElements = array();
                        while ($result->next()) {
                            $fromNameElements[(int) $result->id] = \Input::post($result->name);
                        }

                        foreach ($fromNameFieldIds as $fromNameFieldId) {
                            $fromName = trim($fromName . ' ' . $fromNameElements[$fromNameFieldId]);
                        }
                    }
                } else {
                    System::log('Unserializing value of tl_form.fromNameField to array failed -- ' . $form->fromNameField, 'FormSendViaEmailExtended prepareFormData()', TL_ERROR);
                }
            } else {
                // Festgelegte Absender-E-Mail-Adresse als From benutzen
                $fromName = $form->fromName;
            }

            if ('' !== trim($fromName)) {
                $email->fromName = $fromName;
            }

            // Sender festlegen aus Formular-Konfiguration
            $email->senderAddress = $form->senderAddress;

            // Fallback to default subject
            if (!strlen($email->subject)) {
                $email->subject = $form->replaceInsertTags($form->subject);
            }

            // Send copy to sender
            if (strlen($arrSubmitted['cc'])) {
                $email->sendCc(\Input::post('email', true));
                unset($_SESSION['FORM_DATA']['cc']);
            }

            // Attach XML file
            if ($form->format == 'xml') {
                $objTemplate = new \FrontendTemplate('form_xml');

                $objTemplate->fields = $fields;
                $objTemplate->charset = $GLOBALS['TL_CONFIG']['characterSet'];

                $email->attachFileFromString($objTemplate->parse(), 'form.xml', 'application/xml');
            }

            // Attach CSV file
            if ($form->format == 'csv') {
                $email->attachFileFromString(\StringUtil::decodeEntities('"' . implode('";"', $keys) . '"' . "\n" . '"' . implode('";"', $values) . '"'), 'form.csv', 'text/comma-separated-values');
            }

            $uploaded = '';

            // Attach uploaded files
            if (!empty($_SESSION['FILES'])) {
                foreach ($_SESSION['FILES'] as $file) {
                    // Add a link to the uploaded file
                    if ($file['uploaded']) {
                        $uploaded .= "\n" . \Environment::get('base') . str_replace(TL_ROOT . '/', '', dirname($file['tmp_name'])) . '/' . rawurlencode($file['name']);
                        continue;
                    }

                    $email->attachFileFromString(file_get_contents($file['tmp_name']), $file['name'], $file['type']);
                }
            }

            $uploaded = strlen(trim($uploaded)) ? "\n\n---\n" . $uploaded : '';

            // Send e-mail
            $email->text = \StringUtil::decodeEntities(trim($message)) . $uploaded . "\n\n";
            $email->sendTo($recipients);

            // Flag sendViaEmail deaktivieren, damit die Standardroutine nicht
            // ausgeführt wird
            $form->sendViaEmail = '';
        }
    }

    protected static function getTextfields($formOrDataContainer, $query, $combineNameAndLabel = true)
    {
        $fields = array();

        if (!$formOrDataContainer instanceof DataContainer && !$formOrDataContainer instanceof Form) {
            throw new Exception('Argument 1 passed to FormSendViaEmailExtended::getTextfields() must be an instance of Contao\DataContainer or Contao\Form, instance of ' . get_class($formOrDataContainer) . ' given.');
        }

        $recordId = $formOrDataContainer->activeRecord ? $formOrDataContainer->activeRecord->id : ($formOrDataContainer->id ? $formOrDataContainer->id : false);

        if (false !== $recordId) {
            $result = $formOrDataContainer->Database->prepare($query)->execute($recordId);

            if ($result) {
                while ($result->next()) {
                    $label = $result->name;
                    if ($combineNameAndLabel) {
                        if ('' !== trim($result->label)) {
                            $label = $result->label . ' (' . $label . ')';
                        }
                    }

                    $fields[(int) $result->id] = $label;
                }
            }
        }

        return $fields;
    }

    public static function getFormFields($formOrDataContainer, $combineNameAndLabel = true)
    {
        return self::getTextfields($formOrDataContainer, 'SELECT `id`, `name`, `label` FROM `tl_form_field` WHERE `pid` = ? AND `type` IN (\'text\',\'password\',\'textarea\',\'select\',\'radio\',\'checkbox\',\'hidden\',\'captcha\') ORDER BY `sorting` ASC', $combineNameAndLabel);
    }

    public static function getPossibleFromNameFields($formOrDataContainer)
    {
        return self::getTextfields($formOrDataContainer, 'SELECT `id`, `name`, `label` FROM `tl_form_field` WHERE `pid` = ? AND `type` = \'text\' ORDER BY `name` ASC');
    }

    public static function getPossibleFromAddressFields($formOrDataContainer)
    {
        return self::getTextfields($formOrDataContainer, 'SELECT `id`, `name`, `label` FROM `tl_form_field` WHERE `pid` = ? AND `type` = \'text\' AND `rgxp` = \'email\' ORDER BY `name` ASC');
    }

    public static function saveCallbackFromAddressField($value, DataContainer $dc)
    {
        if (!$dc->activeRecord) {
            throw new Exception('Cannot check dependency.');
        }

        if ($dc->activeRecord->useFieldAsFromAddress) {
            if ('' === $value) {
                throw new Exception('Bitte wählen Sie das Textfeld mit Eingabeprüfung "E-Mail-Adresse" aus, dessen Wert als Absender-E-Mail-Adresse verwendet werden soll.');
            }
        }

        return $value;
    }

    public static function saveCallbackFromAddress($value, DataContainer $dc)
    {
        if (!$dc->activeRecord) {
            throw new Exception('Cannot check dependency.');
        }

        if (!$dc->activeRecord->useFieldAsFromAddress) {
            if ('' === $value) {
                throw new Exception('Bitte geben Sie eine Absender-E-Mail-Adresse ein.');
            }
        }

        return $value;
    }

    public static function saveCallbackFromNameField($value, DataContainer $dc)
    {
        if (!$dc->activeRecord) {
            throw new Exception('Cannot check dependency.');
        }

        if ($dc->activeRecord->useFieldAsFromName) {
            if ('' === $value) {
                throw new Exception('Bitte wählen Sie das Textfeld aus, dessen Wert als Absender-Name verwendet werden soll.');
            }
        }

        return $value;
    }

    public static function saveCallbackFromName($value, DataContainer $dc)
    {
        if (!$dc->activeRecord) {
            throw new Exception('Cannot check dependency.');
        }

        if (!$dc->activeRecord->useFieldAsFromName) {
            if ('' === $value) {
                throw new Exception('Bitte geben Sie einen Absender-Namen ein.');
            }
        }

        return $value;
    }
}
