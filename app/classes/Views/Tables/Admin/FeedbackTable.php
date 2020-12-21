<?php

namespace App\Views\Tables\Admin;

use App\App;
use App\Views\Forms\Admin\Feedback\FeedbackStatusForm;
use Core\Views\Table;

class FeedbackTable extends Table
{
    protected FeedbackStatusForm $form;

    public function __construct()
    {
        $this->form = new FeedbackStatusForm();
        $rows = App::$db->getRowsWhere('feedbacks');

        foreach ($rows as $id => &$row) {

            $user = App::$db->getRowWhere('users', ['email' => $row['email']]);

            $row['user_name'] = $user['user_name'];
            $timestamp = date('Y-m-d H:i:s', $row['timestamp']);
            $row['timestamp'] = $timestamp;

            $statusForm = new FeedbackStatusForm($row['status'], $id);
            $row['status_form'] = $statusForm->render();

            unset($row['email'], $row['status']);
        }

        parent::__construct([
            'headers' => [
                'ID',
                'Service Name',
                'Time',
                'User Name',
                'Status'
            ],
            'rows' => $rows
        ]);
    }

}