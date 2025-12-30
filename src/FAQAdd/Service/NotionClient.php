<?php

namespace FAQAdd\Service;

class NotionClient
{
    private string $token;
    private string $apiBase = 'https://api.notion.com/v1';

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    private function request(string $method, string $uri, $body = null): array
    {
        $ch = curl_init($this->apiBase . $uri);

        $headers = [
            'Authorization: Bearer ' . $this->token,
            'Notion-Version: 2025-09-03',
            'Content-Type: application/json',
        ];

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => $method,
            CURLOPT_HTTPHEADER     => $headers,
        ]);

        if ($body !== null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        }

        $response = curl_exec($ch);

        if ($response === false) {
            throw new \RuntimeException(curl_error($ch));
        }

        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $data = json_decode($response, true);

        if ($status >= 400) {
            throw new \RuntimeException($data['message'] ?? 'Notion API error');
        }

        return $data;
    }


    public function getDatabase(string $databaseId): array
    {
        return $this->request('GET', "/databases/{$databaseId}");
    }

    public function queryDataSource(string $dataSourceId): array
    {
        $results = [];
        $cursor  = null;

        do {
            $payload = $cursor
                ? ['start_cursor' => $cursor]
                : new \stdClass();

            $response = $this->request(
                'POST',
                "/data_sources/{$dataSourceId}/query",
                $payload
            );

            $results = array_merge($results, $response['results']);
            $cursor  = $response['has_more'] ? $response['next_cursor'] : null;
        } while ($cursor);

        return $results;
    }
}
