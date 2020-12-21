<?php

namespace App\Controllers\User;

use App\Controllers\Base\UserController;
use App\Views\BasePage;
use App\Views\Tables\User\FeedbackTable;

class FeedbackController extends UserController
{
    protected BasePage $page;

    public function __construct()
    {
        parent::__construct();
        $this->page = new BasePage([
            'title' => 'Feedback',
            'js' => ['/media/js/user/feedback.js']
        ]);
    }

    public function index(): ?string
    {
        $table = new FeedbackTable();
        $this->page->setContent($table->render());

        return $this->page->render();
    }
}