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
            $users = App::$db->getRowsWhere('users');
            $logged_user = App::$session->getUser();

            foreach ($users as $id => $user) {
                if ($logged_user['email'] === $user['email']) {
                    $user_id = $id;
                }
            }

            $feedback = $form->values();

            $feedback['id'] = App::$db->insertRow('feedback', $form->values() + [
                    'user_id' => $user_id,
                    'timestamp' =>$this->timeFormat(time())
                ]);

            $feedback = $this->buildRow($logged_user, $feedback);
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
        date_default_timezone_set('Europe/Vilnius');

        return date('Y-m-d H:i:s', $time);
    }
}