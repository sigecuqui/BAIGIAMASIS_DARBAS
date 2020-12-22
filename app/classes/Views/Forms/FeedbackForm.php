<?php


namespace App\Views\Forms;


use Core\Views\Form;

class FeedbackForm extends Form
{
    /**
     * FeedbackForm constructor. Make a feedback form
     */
    public function __construct()
    {
        parent::__construct([
            'fields' => [
                'comment' => [
                    'label' => 'Make a feedback',
                    'type' => 'textarea',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_number_of_symbols' => [
                            'max' => 500
                        ]
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Tell your experience about our gym',
                        ],
                    ],
                ],
            ],
        ]);
    }
}