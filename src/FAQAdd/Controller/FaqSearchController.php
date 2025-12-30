<?php

namespace FAQAdd\Controller;

use Contao\CoreBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Contao\Database;

class FaqSearchController extends AbstractController
{   
    public function search(Request $request): JsonResponse
    {
        $query = trim($request->get('q'));
        $cluster = $request->get('cluster');
        $lang = $request->get('lang', $request->getLocale() ?? 'de');

        if (mb_strlen($query) < 3) {
            return new JsonResponse([]);
        }

        $db = Database::getInstance();

        // Select language-based fields
        $questionField = $lang === 'de' ? 'de_question' : 'en_question';
        $answerField   = $lang === 'de' ? 'de_answer'   : 'en_answer';

        $sql = "
            SELECT $questionField AS question, $answerField AS answer
            FROM tl_notion_faq
            WHERE (status IS NULL OR status != 'deleted')
              AND ($questionField LIKE ? OR $answerField LIKE ?)
        ";

        $params = [
            '%' . $query . '%',
            '%' . $query . '%',
        ];

        if ($cluster) {
            $sql .= " AND maincluster = ?";
            $params[] = $cluster;
        }

        $sql .= " ORDER BY id ASC LIMIT 10";

        $result = $db->prepare($sql)->execute(...$params);

        $items = [];

        while ($result->next()) {
            $rawQuestion = $result->question;
            $rawAnswer   = strip_tags($result->answer);

            $highlight = function ($text, $term, $cls = '') {
                return preg_replace(
                    '/' . preg_quote($term, '/') . '/i',
                    '<mark' . ($cls ? ' class="' . $cls . '"' : '') . '>$0</mark>',
                    $text
                );
            };

            $items[] = [
                'question' => $highlight($rawQuestion, $query, 'qs'),
                'answer'   => $highlight(mb_substr($rawAnswer, 0, 160) . '…', $query),
            ];
        }

        return new JsonResponse($items);
    }
}
