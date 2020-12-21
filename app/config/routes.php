<?php

use Core\Router;

// Auth Controllers
Router::add('login', '/login', \App\Controllers\Common\Auth\LoginController::class, 'login');
Router::add('register', '/register', \App\Controllers\Common\Auth\RegisterController::class, 'register');
Router::add('logout', '/logout', \App\Controllers\Common\Auth\LogoutController::class, 'logout');
Router::add('install', '/install', \App\Controllers\Common\InstallController::class, 'install');

// Common Routes
Router::add('index', '/', \App\Controllers\Common\HomeController::class);
Router::add('index2', '/index.php', \App\Controllers\Common\HomeController::class);

// Admin Routes
Router::add('admin_feedback', "/admin/feedback", \App\Controllers\Admin\FeedbackController::class);
Router::add('admin_users', "/admin/users", \App\Controllers\Admin\UsersController::class);

// User Routes
Router::add('user_feedback', '/feedback', \App\Controllers\User\FeedbackController::class);

// API Routes
Router::add('api_review_get', '/api/review/get', \App\Controllers\Common\API\ReviewApiController::class);
Router::add('api_review_create', '/api/review/create', \App\Controllers\Admin\API\ReviewApiController::class, 'create');
Router::add('api_review_edit', '/api/review/edit', \App\Controllers\Admin\API\ReviewApiController::class, 'edit');
Router::add('api_review_update', '/api/review/update', \App\Controllers\Admin\API\ReviewApiController::class, 'update');
Router::add('api_review_delete', '/api/review/delete', \App\Controllers\Admin\API\ReviewApiController::class, 'delete');

Router::add('api_feedback_create', '/api/feedback/create', \App\Controllers\User\API\FeedbackApiController::class, 'create');
Router::add('api_user_feedback_get', '/api/feedback/user/get', \App\Controllers\User\API\FeedbackApiController::class);

Router::add('api_admin_feedback_get', '/api/feedback/admin/get', \App\Controllers\Admin\API\FeedbackApiController::class);
Router::add('api_feedback_edit', '/api/feedback/admin/edit', \App\Controllers\Admin\API\FeedbackApiController::class, 'edit');
Router::add('api_feedback_update', '/api/feedback/admin/update', \App\Controllers\Admin\API\FeedbackApiController::class, 'update');

Router::add('api_admin_users_get', '/api/admin/users/get', \App\Controllers\Admin\API\UsersApiController::class);
Router::add('api_admin_users_edit', '/api/admin/users/edit', \App\Controllers\Admin\API\UsersApiController::class, 'edit');
Router::add('api_admin_users_update', '/api/admin/users/update', \App\Controllers\Admin\API\UsersApiController::class, 'update');
