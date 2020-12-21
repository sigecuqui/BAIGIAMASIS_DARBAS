<?php


namespace App\Controllers\User\API;


use App\App;
use App\Controllers\Base\API\AuthController;
use App\Views\Forms\FeedbackCreateForm;
use Core\Api\Response;

class FeedbackApiController extends AuthController
{
    public function create(): string
    {
        // This is a helper class to make sure
        // we use the same API json response structure
        $response = new Response();
        $form = new FeedbackCreateForm();

        if ($form->validate()) {
            $user = App::$session->getUser();

            $feedback = $form->values();
            $feedback['id'] = App::$db->insertRow('feedback', $form->values() + [
                    'name' => $user['name'],
                    'timestamp' => time()
                ]);

            $feedback = $this->buildRow($user, $feedback);
            $response->setData($feedback);
        } else {
            $response->setErrors($form->getErrors());
        }

        // Returns json-encoded response
        return $response->toJson();
    }


    /**
     * Formats row for json to be used in update method,
     * so that the data would be updated in the same format.
     *
     * @param $user
     * @param $feedback
     * @return array
     */
    private function buildRow($user, $feedback): array
    {
        return $row = [
            'id' => $feedback['id'],
            'name' => $user['name'],
            'comment' => $feedback['comment'],
            'timestamp' => $this->timeFormat(time())
        ];
    }

    /**
     * Returns formatted time from timestamp given in row.
     *
     * @param $time
     * @return string
     */
    private function timeFormat($time)
    {
        return date('Y-m-d H:i:s', $time);
    }
}