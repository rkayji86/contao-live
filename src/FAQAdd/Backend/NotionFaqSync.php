<?php

namespace FAQAdd\Backend;

use Contao\Backend;
use Contao\Message;
use Contao\Controller;
use FAQAdd\Service\NotionFaqSyncService;

class NotionFaqSync extends Backend
{
    /**
     * Trigger manual sync
     */
    public function run(): void
    {
        try {
            $service = new NotionFaqSyncService();
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
