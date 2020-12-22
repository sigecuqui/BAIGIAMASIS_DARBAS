<?php


namespace App\Views\Forms;


class FeedbackCreateForm extends FeedbackForm
{
    public function __construct() {
        parent::__construct();

        $this->data['attr']['id'] = 'feedback-create-form';
        $this->data['buttons']['create'] = [
            'title' => 'Post',
        ];
    }
}