<?php


namespace App\Controllers\Common\API;


use App\App;
use Core\Api\Response;

class FeedbackApiController
{
    public function index(): string
    {
        $response = new Response();

        $feedbacks = App::$db->getRowsWhere('feedback');

        $rows = $this->buildRows($feedbacks);

        // Setting "what" to json-encode
        $response->setData($rows);

        // Returns json-encoded response

        return $response->toJson();
    }

    /**
     * Returns formatted time from timestamp given in row.
     *
     * @param $row
     * @return string
     */
    private function timeFormat($row)
    {
        return date('Y-m-d H:i:s', $row['timestamp']);
    }

    /**
     * Formats rows from given @param (in this case - feedback data)
     * Intended use is for setting data in json.
     *
     * @return mixed
     */
    private function buildRows($feedbacks)
    {
        foreach ($feedbacks as $id => &$row) {
            $user = App::$db->getRowById('users', $row['user_id']);

            $row = [
                'id' => $id,
                'name' => $user['name'],
                'comment' => $row['comment'],
                'timestamp' => $this->timeFormat($row)
            ];
        }

        return $feedbacks;
    }

}