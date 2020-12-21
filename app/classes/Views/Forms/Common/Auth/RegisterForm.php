<?php

namespace App\Views\Forms\Common\Auth;

use Core\Views\Form;

class RegisterForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'fields' => [
                'email' => [
                    'label' => 'Email',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_email',
                        'validate_user_unique',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter email',
                        ]
                    ]
                ],
                'user_name' => [
                    'label' => 'Name',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter your name',
                        ]
                    ]
                ],
                'user_surname' => [
                    'label' => 'Surname',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter your surname',
                        ]
                    ]
                ],
                'phone' => [
                    'label' => 'Phone number',
                    'type' => 'numbers',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter your phone number',
                        ]
                    ]
                ],
                'address' => [
                    'label' => 'Address',
                    'type' => 'numbers',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter your home address',
                        ]
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter password',
                        ]
                    ]
                ],
                'password_repeat' => [
                    'label' => 'Password Repeat',
                    'type' => 'password',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Repeat password',
                        ]
                    ]
                ],
            ],
            'buttons' => [
                'register' => [
                    'title' => 'Register',
                ]
            ],
            'validators' => [
                'validate_fields_match' => [
                    'password',
                    'password_repeat'
                ]
            ]
        ]
    );

    }
}