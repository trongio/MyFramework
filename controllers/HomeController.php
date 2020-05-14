<?php
namespace app\controllers;

use \app\IRequest;
use app\Router;

class HomeController
{
    public function home()
    {
        return "Home";
    }

    public function contact(IRequest $request, Router $router)
    {
        $data = $request->getBody();

        $errors = [];
        if (!$data['email']) {
            $errors['email'] = "This field is required";
        }

        if (empty($errors)) {
            // Email sending
        }

        return $router->renderView('contact', [
            'errors' => $errors,
            'data' => $data
        ]);
    }
}