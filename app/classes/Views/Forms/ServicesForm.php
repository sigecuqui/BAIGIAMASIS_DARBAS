<?php


namespace App\Views\Forms;


use Core\Views\Form;

class ServicesForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'attr' => [
                'method' => 'POST'
            ],
            'fields' => [
                'individual' => [
                    'label' => 'Individual training',
                    'type' => 'text',
                    'value' => 'Individual training with a personal certificated coach',
                    'extra' => [
                        'attr' => [
                            'class' => 'individual'
                        ]
                    ]
                ],
                'group' => [
                    'label' => 'Group training',
                    'type' => 'text',
                    'value' => 'Group activities: fitness, muscle building, cross-fit, etc.',
                    'extra' => [
                        'attr' => [
                            'class' => 'group'
                        ]
                    ]
                ],
                'consult' => [
                    'label' => 'Training consultations',
                    'type' => 'text',
                    'value' => 'All information you need about health, sport and much more!',
                    'extra' => [
                        'attr' => [
                            'class' => 'consult'
                        ]
                    ]
                ]
            ],
        ]);
    }
}