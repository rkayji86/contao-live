<?php

namespace FAQAdd\Controller;

use FAQAdd\Service\NotionFaqSyncService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Contao\CoreBundle\Controller\AbstractController;
use Contao\System;
use Contao\CoreBundle\Monolog\ContaoContext;
use Psr\Log\LogLevel;

class NotionWebhookController extends AbstractController
{
    private NotionFaqSyncService $syncService;

    public function __construct(NotionFaqSyncService $syncService)
    {
        $this->syncService = $syncService;
    }

    public function webhookAPI(Request $request): JsonResponse
    {
        $payload = json_decode($request->getContent(), true);

        // STEP 2: subscription verification
        // if (isset($payload['verification_token'])) {

        //     // OPTIONAL: persist token for later validation
        //     // store in env, DB, or config
        //     // Example:
        //     // file_put_contents('/tmp/notion_webhook_token', $payload['verification_token']);

        //     return new JsonResponse(['status' => 'verified'], 200);
        // }

        // STEP 3: real events (handled below)
        // $this->verifyNotionSignature($request);

        $this->syncService->sync();

        return new JsonResponse(['status' => 'ok'], 200);
    }

    private function verifyNotionSignature(Request $request): void
    {
        $signatureHeader = $request->headers->get('X-Notion-Signature');

        if (!$signatureHeader) {
            throw new \RuntimeException('Missing X-Notion-Signature');
        }

        if (!str_starts_with($signatureHeader, 'sha256=')) {
            throw new \RuntimeException('Invalid signature format');
        }

        $receivedSignature = substr($signatureHeader, 7);

        // IMPORTANT: use the SAME verification_token you received earlier
        $verificationToken = $_ENV['NOTION_TOKEN'];

        if (!$verificationToken) {
            throw new \RuntimeException('Missing NOTION_TOKEN');
        }

        $calculated = hash_hmac(
            'sha256',
            $request->getContent(),
            $verificationToken
        );

        if (!hash_equals($calculated, $receivedSignature)) {
            throw new \RuntimeException('Invalid Notion signature');
        }
    }
}
