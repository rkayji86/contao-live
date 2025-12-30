<?php

namespace FAQAdd\Backend;

use Contao\Backend;
use Contao\Message;
use Contao\Controller;
use Contao\System;

class NotionFaqSync extends Backend
{
    /**
     * Trigger manual sync
     */

    public function run(): void
    {
        try {
            /** @var \FAQAdd\Service\NotionFaqSyncService $service */
            $service = System::getContainer()->get(\FAQAdd\Service\NotionFaqSyncService::class);
            $result = $service->sync();

            Message::addConfirmation(sprintf(
                'Notion FAQ sync completed. Created: %d, Updated: %d, Total: %d',
                $result['created'],
                $result['updated'],
                $result['total']
            ));
        } catch (\Throwable $e) {
            Message::addError('Notion FAQ sync failed: ' . $e->getMessage());
        }

        Controller::redirect(Controller::getReferer());
    }
}
