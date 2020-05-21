<?php


namespace app\controllers;


use app\db\database;
use app\IRequest;
use app\Router;

class LoginController
{
    public function login(IRequest $request, Router $router){
        $data = $request->getBody();
        $database=new database();
        $errors=[];

        if(!$data['email'])
            $errors['email'] = "required field";
        if(!$data['password'])
            $errors['password'] = "required field";

        $input = new database();
        list($success, $message) = $input->login($data['email'],$data['password']);

        if($success!=true){
            if($message=='Email doesnt exists')
                $errors['email'] = "Email doesnt exists";
            else  $errors['password'] = "Password is incorrect";
        }

        $params = [
            'errors' => $errors,
            'data' => $data
        ];

        if(empty($errors)){
            //login required
        } else return $router->renderView('register', $params);
    }

}