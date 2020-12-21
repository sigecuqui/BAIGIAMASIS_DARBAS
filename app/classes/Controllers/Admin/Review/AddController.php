<?php

namespace App\Controllers\Admin\Review;

use App\App;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Content\FormContent;
use App\Views\Forms\Admin\AddForm;
use Core\View;

class AddController extends AuthController
{
    protected AddForm $form;
    protected BasePage $page;
    protected FormContent $form_content;

    public function __construct()
    {
        parent::__construct();
        $this->form = new AddForm();
        $this->page = new BasePage([
            'title' => 'Add Services',
        ]);
    }

    public function add(): ?string
    {
        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();

            App::$db->insertRow('reviews', $clean_inputs);

            $msg = 'You added an item';
        }

        $this->form_content = new FormContent([
            'title' => 'Add',
            'form' => $this->form->render(),
            'message' => $msg ?? null
        ]);

        $this->page->setContent($this->form_content->render());

        return $this->page->render();
    }

}