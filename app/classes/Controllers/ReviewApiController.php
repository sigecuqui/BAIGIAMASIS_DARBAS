<?php

namespace App\Controllers;

use App\App;
use App\Controllers\Base\API\AdminController;
use App\Views\Forms\Admin\Review\ReviewCreateForm;
use App\Views\Forms\Admin\Review\ReviewUpdateForm;
use Core\Api\Response;

class ReviewApiController extends AdminController
{

    public function create(): string
    {
        // This is a helper class to make sure
        // we use the same API json response structure
        $response = new Response();
        $form = new ReviewCreateForm();

        if ($form->validate()) {
            $review = $form->values();
            $review['id'] = App::$db->insertRow('reviews', $form->values());
            $review['buttons']['delete'] = 'Delete';
            $review['buttons']['edit'] = 'Edit';
            $response->setData($review);
        } else {
            $response->setErrors($form->getErrors());
        }

        // Returns json-encoded response
        return $response->toJson();
    }

    public function edit(): string
    {
        // This is a helper class to make sure
        // we use the same API json response structure
        $response = new Response();

        $id = $_POST['id'] ?? null;

        if ($id === null) {
            $response->appendError('ApiController could not update, since ID is not provided! Check JS!');
        } else {
            $review = App::$db->getRowById('reviews', $id);
            $review['id'] = $id;

            // Setting "what" to json-encode
            $response->setData($review);
        }

        // Returns json-encoded response
        return $response->toJson();
    }

    /**
     * Updates review data
     * and returns array from which JS generates grid item
     *
     * @return string
     */
    public function update(): string
    {
        // This is a helper class to make sure
        // we use the same API json response structure
        $response = new Response();

        $id = $_POST['id'] ?? null;

        if ($id === null || $id == 'undefined') {
            $response->appendError('ApiController could not update, since ID is not provided! Check JS!');
        } else {
            $form = new ReviewUpdateForm();

            if ($form->validate()) {
                App::$db->updateRow('reviews', $id, $form->values());

                $review = $form->values();
                $review['id'] = $id;
                $review['buttons']['delete'] = 'Delete';
                $review['buttons']['edit'] = 'Edit';

                $response->setData($review);
            } else {
                $response->setErrors($form->getErrors());
            }
        }

        // Returns json-encoded response
        return $response->toJson();
    }

    public function delete(): string
    {
        // This is a helper class to make sure
        // we use the same API json response structure
        $response = new Response();

        $id = $_POST['id'] ?? null;

        if ($id === null || $id == 'undefined') {
            $response->appendError('ApiController could not delete, since ID is not provided! Check JS!');
        } else {
            $response->setData([
                'id' => $id
            ]);
            App::$db->deleteRow('reviews', $id);
        }

        // Returns json-encoded response
        return $response->toJson();
    }
}






