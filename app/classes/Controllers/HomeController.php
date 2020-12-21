<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\App;
use App\Views\BasePage;
use App\Views\Content\HomeContent;
use App\Views\Forms\Admin\FeedbackForm;
use Core\View;
use Core\Views\Link;

class HomeController extends Controller
{
    protected BasePage $page;
    protected $link;

    /**
     * Controller constructor.
     *
     * We can write logic common for all
     * other methods
     *
     * For example, create $page object,
     * set it's header/navigation
     * or check if user has a proper role
     *
     * Goal is to prepare $page
     */
    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'GYM'
        ]);
    }

    /**
     * This method builds or sets
     * current $page content
     * renders it and returns HTML
     *
     * So if we have ex.: ServicesController,
     * it can have methods responsible for
     * index() (main page, usualy a list),
     * view() (preview single),
     * create() (form for creating),
     * edit() (form for editing)
     * delete()
     *
     * These methods can then be called on each page accordingly, ex.:
     * add.php:
     * $controller = new PixelsController();
     * print $controller->add();
     *
     *
     * my.php:
     * $controller = new ServicesController();
     * print $controller->my();
     *
     * @return string|null
     * @throws \Exception
     */
    function index(): ?string
    {
        if (App::$session->getUser()) {
            $h3 = "Welcome back, {$_SESSION['email']}";
        } else {
            $h3 = 'Please log in';
        }

        $home_content = new HomeContent();

        $home_content->content();

        $rows = App::$db->getRowsWhere('reviews'); //TODO: rows yra services, cia sudaryti

        foreach ($rows as $id => &$row) {
          if (App::$session->getUser()) {
                    $feedbackForm = new FeedbackForm($row['name']);
                    $row['feedback'] = $feedbackForm->render();
                }
        }

        $content = new View([
            'title' => 'WELCOME TO "MASKULINIS" GYM',
            'heading' => $h3,
            'buttons' => [
                'login_or_create' => $home_content->redirectLink(),
            ],
            'services' => $rows
        ]);

        $this->page->setContent($content->render(ROOT . '/app/templates/content/index.tpl.php'));

        return $this->page->render();
    }
}