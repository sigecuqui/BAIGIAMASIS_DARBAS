<?php


namespace App\Controllers\User\API;


use App\App;
use App\Controllers\Base\API\UserController;
use Core\Api\Response;

class FeedbackApiController extends UserController
{
    public function index(): string
    {
        $response = new Response();

        $user = App::$session->getUser();
        $feedbacks = App::$db->getRowsWhere('feedbacks', ['email' => $user['email']]);

        $rows = $this->buildRows($feedbacks);

        // Setting "what" to json-encode
        $response->setData($rows);

        // Returns json-encoded response

        return $response->toJson();
    }

    /**
     * Returns formatted time.
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
     * @param $feedbacks
     * @return mixed
     */
    private function buildRows($feedbacks)
    {
        foreach ($feedbacks as $id => &$row) {
            $review = App::$db->getRowById('reviews', $row['review_id']);

            $row = [
                'id' => $id,
                'status' => $row['status'],
                'name' => $review['name'],
                'timestamp' => $this->timeFormat($row)
            ];
        }

        return $feedbacks;
    }

    public function create(): string
    {
        // This is a helper class to make sure
        // we use the same API json response structure
        $response = new Response();

        $id = $_POST['id'] ?? null;
        $user = App::$session->getUser();

        if ($id === null || $id == 'undefined') {
            $response->appendError('ApiController could not create, since ID is not provided! Check JS!');
        } else {
            $response->setData([
                'id' => $id
            ]);

            App::$db->insertRow('feedbacks', [
                'review_id' => $id,
                'status' => 'active',
                'timestamp' => time(),
                'email' => $user['email']
            ]);
        }

        // Returns json-encoded response
        return $response->toJson();
    }
}