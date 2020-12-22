<?php

namespace App\Controllers\Common;

use App\Views\BasePage;
use Core\View;

class HomeController
{
    protected $page;

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
     * Home Controller Index
     *
     * @return string|null
     * @throws \Exception
     */
    public function index(): ?string
    {
        $content = (new View([
            'title' => 'Welcome to "MASKULINIS" gym',

            'services' => [
                'Individual training' => [
                    'description' => 'Individual training with a personal certificated coach',
                    'img' => 'individual'
                ],
                'Group training' => [
                    'description' => 'Group activities: fitness, muscle building, cross-fit, etc.',
                    'img' => 'group'
                ],
                'Training consultations' => [
                    'description' => 'All information you need about health, sport and much more!',
                    'img' => 'consult'
                ]
            ],
        ]))->render(ROOT . '/app/templates/content/index.tpl.php');

        $this->page->setContent($content);

        return $this->page->render();
    }
}
