<?php


namespace App\Views\Forms\Admin;


use Core\Views\Form;

class FeedbackForm extends Form
{
    public function __construct($value = null)
    {
        parent::__construct([
            'attr' => [
                'method' => 'POST'
            ],
            'fields' => [
                'id' => [
                    'type' => 'hidden',
                    'value' => 'FEEDBACK'
                ],
                'name' => [
                    'type' => 'hidden',
                    'value' => $value
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Write a feedback',
                    'type' => 'submit',
                    'extra' => [
                        'attr' => [
                            'class' => 'btn'
                        ]
                    ]
                ],
            ]
        ]);
    }
}