<?php

namespace FAQAdd\Service;

use Contao\Database;
use Notion\Notion;

class NotionFaqSyncService
{
    protected Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * Main entry point
     */
    public function sync(): array
    {
        $settings = $this->getSettings();

        if (!$settings) {
            throw new \RuntimeException('Notion FAQ settings not configured.');
        }
        $notion = Notion::create($settings['notion_token']);
        $database = $notion->databases()->find($settings['database_id']);
        $pages = $notion->databases()->queryAllPages($database);

        $allowedStatuses = $this->deserialize($settings['allowed_statuses']);

        $syncedIds = [];
        $created = 0;
        $updated = 0;

        foreach ($pages as $page) {
            $result = $this->upsertPage($page, $allowedStatuses);
            if ($result === 'created') {
                $created++;
            } elseif ($result === 'updated') {
                $updated++;
            }

            if ($result !== 'skipped') {
                $syncedIds[] = $page->id;
            }
        }

        $this->softDeleteMissing($syncedIds);
        $this->updateLastSync($settings['id']);

        return [
            'created' => $created,
            'updated' => $updated,
            'total'   => count($syncedIds)
        ];
    }

    /**
     * Insert or update a single Notion page
     */
    protected function upsertPage($page, array $allowedStatuses): string
    {
        $props = $page->properties;

        $status = $props['status']->option->name ?? null;

        if ($allowedStatuses && !in_array($status, $allowedStatuses, true)) {
            return 'skipped';
        }

        $data = [
            'notion_id'     => $page->id,
            'maincluster'   => $props['maincluster']->option->name ?? null,
            'subcluster'    => $props['subcluster']->option->name ?? null,
            'de_question'   => $props['de_question']->text[0]->plainText ?? null,
            'de_answer'     => $props['de_answer']->text[0]->plainText ?? null,
            'en_question'   => $props['en_question']->text[0]->plainText ?? null,
            'en_answer'     => $props['en_answer']->text[0]->plainText ?? null,
            'internal_link' => $props['internal_link']->text[0]->plainText ?? null,
            'reference'     => $props['reference']->text[0]->plainText ?? null,
            'status'        => $status,
        ];

        $existing = $this->db
            ->prepare("SELECT id FROM tl_notion_faq WHERE notion_id=?")
            ->execute($page->id);

        if ($existing->numRows > 0) {
            $this->db
                ->prepare("
                    UPDATE tl_notion_faq SET
                        maincluster=?,
                        subcluster=?,
                        de_question=?,
                        de_answer=?,
                        en_question=?,
                        en_answer=?,
                        internal_link=?,
                        reference=?,
                        status=?
                    WHERE notion_id=?
                ")
                ->execute(
                    $data['maincluster'],
                    $data['subcluster'],
                    $data['de_question'],
                    $data['de_answer'],
                    $data['en_question'],
                    $data['en_answer'],
                    $data['internal_link'],
                    $data['reference'],
                    $data['status'],
                    $data['notion_id']
                );

            return 'updated';
        }

        $this->db
            ->prepare("
                INSERT INTO tl_notion_faq
                (notion_id, maincluster, subcluster, de_question, de_answer, en_question, en_answer, internal_link, reference, status)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ")
            ->execute(
                $data['notion_id'],
                $data['maincluster'],
                $data['subcluster'],
                $data['de_question'],
                $data['de_answer'],
                $data['en_question'],
                $data['en_answer'],
                $data['internal_link'],
                $data['reference'],
                $data['status']
            );

        return 'created';
    }

    /**
     * Soft delete records not present in Notion anymore
     */
    protected function softDeleteMissing(array $activeNotionIds): void
    {
        if (empty($activeNotionIds)) {
            return;
        }

        $placeholders = implode(',', array_fill(0, count($activeNotionIds), '?'));

        $this->db
            ->prepare("
                UPDATE tl_notion_faq
                SET status='deleted'
                WHERE notion_id NOT IN ($placeholders)
            ")
            ->execute(...$activeNotionIds);
    }

    /**
     * Load backend settings
     */
    protected function getSettings(): ?array
    {
        $result = $this->db
            ->execute("SELECT * FROM tl_notion_faq_settings LIMIT 1");

        return $result->numRows ? $result->row() : null;
    }

    protected function updateLastSync(int $settingsId): void
    {
        $this->db
            ->prepare("UPDATE tl_notion_faq_settings SET last_sync=NOW() WHERE id=?")
            ->execute($settingsId);
    }

    protected function deserialize(?string $value): array
    {
        return $value ? deserialize($value, true) : [];
    }
}
