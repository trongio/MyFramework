<?php

namespace app\db;



use PDO;

class database
{
    private PDO $pdo;

    public function __construct()
    {
        $config = require __DIR__.'/../config.php';
        $servername = $config['host'];
        $username = $config['username'];
        $password = $config['password'];
        $database = $config['database'];
        $this->pdo =new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function register($full_name,$email,$password,$reg_date){

        $statement = $this->pdo->prepare("insert into users (full_name,email,password,reg_date) 
                                                    Values (:full_name, :email, :password, :date)");
        $statement->bindParam(':full_name',$full_name);
        $statement->bindParam(':email',$email);
        $statement->bindParam(':password',$password);
        $statement->bindParam(':date',$reg_date);
        return $statement->execute();
    }

    public function login($email,$password){
        $statement = $this->pdo->prepare("SELECT * FROM users where email = :email");
        $statement->bindValue(':email',$email);
        $statement->execute();
        $user = $statement->fetchAll(PDO::FETCH_ASSOC);
        if(!$user){
            return [false,'Email doesnt exists'];
        }
        if(!password_verify($password,$user[0]['password'])){
            return [false,'Password is incorrect'];
        } else return true;
    }
}