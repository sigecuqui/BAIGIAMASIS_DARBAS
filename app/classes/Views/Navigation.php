<?php

namespace App\Views;

use App\App;
use Core\View;

class Navigation extends View
{

    public function __construct()
    {
        parent::__construct($this->generate());
    }

    public function generate()
    {
        $nav = [
            /** Left navigation */
            App::$router::getUrl('index') => 'Home',
            App::$router::getUrl('feedback') => 'Feedback',
        ];

        if (App::$session->getUser()) {
            return $nav + [
                    /** Right navigation */
                    App::$router::getUrl('logout') => 'Logout'
                ];
        } else {
            return $nav + [
                    /** Right navigation */
                    App::$router::getUrl('register') => 'Register',
                    App::$router::getUrl('login') => 'Login'
                ];
        }
    }

    public function render($template_path = ROOT . '/app/templates/nav.tpl.php')
    {
        return parent::render($template_path);
    }
}

