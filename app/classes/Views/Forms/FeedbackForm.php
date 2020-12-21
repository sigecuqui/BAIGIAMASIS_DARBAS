<?php


namespace App\Views\Forms;


use Core\Views\Form;

class FeedbackForm extends Form
{
    public function __construct() {
        parent::__construct([
            'fields' => [
                'comment' => [
                    'label' => 'Make a feedback',
                    'type' => 'textarea',
                    'validators' => [
                        'validate_field_not_empty'
                        //TODO ● komentaras negali viršyti 500 simbolių
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter your feedback about our gym',
                        ],
                    ],
                ],
            ],
            // No buttons since they will be defined in Extends
        ]);
    }
}