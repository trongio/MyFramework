<?php


namespace app\controllers;


use app\db\database;
use app\IRequest;
use app\Router;

class RegisterController
{
    public function register(IRequest $request, Router $router)
    {
        $data = $request->getBody();
        $errors=[];
        $input=new database();

        if(!$data['full_name'])
            $errors['full_name'] = "required field";
        if(!$data['email'])
            $errors['email'] = "required field";
        if(!$data['password'])
            $errors['password'] = "required field";

        $params = [
                    'errors' => $errors,
                    'data' => $data
                ];

        if(empty($errors)){
            $input->register($data['full_name'], $data['email'], password_hash($data['password'], PASSWORD_BCRYPT), date("Y-m-d h:i:sa"));
        } else return $router->renderView('register', $params);
    }

}