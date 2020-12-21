<?php


namespace App\Views\Forms;


class FeedbackCreateForm extends FeedbackBaseForm
{
    public function __construct() {
        parent::__construct();

        $this->data['buttons']['feedback'] = [
            'title' => 'Feedback',
        ];
    }
}