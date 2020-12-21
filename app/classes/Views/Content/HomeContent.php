<?php

namespace App\Views\Content;

use App\App;
use App\Views\Forms\FeedbackForm;
use Core\Views\Form;
use Core\Views\Link;

class HomeContent
{
    protected FeedbackForm $feedback;
    protected Link $link;

    public function __construct()
    {
        $this->feedback = new FeedbackForm();
    }

    /**
     * Home content info
     */
    public function content()
    {

        if (isset($_POST['id'])) {

            if ($_POST['id'] === 'FEEDBACK') {
                $rows = App::$db->getRowsWhere('feedbacks');
                $review_id = 1;

                foreach ($rows as $id => $row) {
                    $review_id++;
                }

                App::$db->insertRow('feedbacks', [
                    'email' => $_SESSION['email'],
                    'id' => $review_id,
                    'name' => $_POST['name'],
                    'timestamp' => time()
                ]);
            }

        }

    }

    public function redirectLink()
    {
        if (!App::$session->getUser()) {
            $this->link = new Link([
                'link' => "/login",
                'class' => 'link',
                'text' => 'Login'
            ]);

            return $this->link->render();

        } elseif (App::$session->getUser()) {
                return $this->link->render();
            }
    }
}