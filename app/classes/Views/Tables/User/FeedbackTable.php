<?php

namespace App\Views\Tables\User;

use Core\Views\Table;

class FeedbackTable extends Table
{
    public function __construct($feedbacks = [])
    {
        parent::__construct([
            'headers' => [
                'ID',
                'Status',
                'Feedback',
                'Date'
            ],
            'rows' => $feedbacks
        ]);
    }
}