<?php

namespace App\Controllers\Common\Auth;

use App\App;
use Core\FileDB;

class InstallController
{
    public function install()
    {
        App::$db = new FileDB(DB_FILE);

        App::$db->createTable('users');
        App::$db->insertRow('users', ['email' => 'test@test.lt', 'password' => 'as', 'name' => 'As', 'role' => 'admin']);
        App::$db->createTable('reviews');
        App::$db->createTable('feedbacks');
    }
}

