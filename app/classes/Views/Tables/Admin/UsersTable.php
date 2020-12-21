<?php


namespace App\Views\Tables\Admin;


use App\Views\Table;

class UsersTable extends Table
{
    public function __construct($forms)
    {
        /**
         * Users table info for admin
         */
        parent::__construct([
            'headers' => [
                'ID',
                'Email',
                'Role',
                'Actions'
            ],
            'forms' => $forms ?? []
        ]);
    }
}