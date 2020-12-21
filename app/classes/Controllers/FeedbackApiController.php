<?php


namespace App\Controllers;


use App\App;
use App\Controllers\Base\API\AdminController;
use App\Views\Forms\Admin\Feedback\FeedbackUpdateForm;
use Core\Api\Response;

class FeedbackApiController extends AdminController
{
    public function index(): string
    {
        $response = new Response();
        $feedbacks = App::$db->getRowsWhere('feedbacks');

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
                'timestamp' => $this->timeFormat($row),
                'buttons' => [
                    'edit' => 'Edit'
                ]
            ];
        }

        return $feedbacks;
    }

    public function edit(): string
    {
        // This is a helper class to make sure
        // we use the same API json response structure
        $response = new Response();

        $id = $_POST['id'] ?? null;

        if ($id === null) {
            $response->appendError('ApiController could not update, since ID is not provided! Check JS!');
        } else {
            $feedback = App::$db->getRowById('feedbacks', $id);
            $feedback['id'] = $id;

            // Setting "what" to json-encode
            $response->setData($feedback);
        }

        // Returns json-encoded response
        return $response->toJson();
    }

    /**
     * Formats row for json to be used in update method,
     * so that the data would be updated in the same format.
     *
     * @param $row
     * @param $id
     * @return array
     */
    private function buildRow($row, $id): array
    {
        $review = App::$db->getRowById('reviews', $row['review_id']);

        return $row = [
            'id' => $id,
            'status' => $row['status'],
            'name' => $review['name'],
            'timestamp' => $this->timeFormat($row),
            'buttons' => [
                'edit' => 'Edit'
            ]
        ];
    }

    /**
     * Updates feedback data
     * and returns array from which JS generates table row
     *
     * @return string
     */
    public function update(): string
    {
        // This is a helper class to make sure
        // we use the same API json response structure
        $response = new Response();

        $id = $_POST['id'] ?? null;

        if ($id === null || $id == 'undefined') {
            $response->appendError('ApiController could not update, since ID is not provided! Check JS!');
        } else {

            $form = new FeedbackUpdateForm();
            $feedback = App::$db->getRowById('feedbacks', $id);

            if ($form->validate()) {
                $feedback['status'] = $form->value('status');

                App::$db->updateRow('feedbacks', $id, $feedback);

                $row = $this->buildRow($feedback, $id);

                $response->setData($row);
            } else {
                $response->setErrors($form->getErrors());
            }
        }

        // Returns json-encoded response
        return $response->toJson();
    }

}