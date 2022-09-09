<?php
namespace Classes;
include_once(__DIR__ . '/../vendor/autoload.php');
use Classes\Interfaces\UserInterface;
use Connection\Connection;
   class User extends Connection implements UserInterface {

    public  function getById(int $id) : array|null
    {
        if(!empty($id)){
           $stmt =  $this->connection->prepare("SELECT first_name, last_name,phone,email FROM users where id = ? ");
           $stmt->bind_param('i',$id);
           $stmt->execute();
           return  $stmt->get_result()->fetch_assoc();
        }else{
            return null;
        }
    }
    public  function getByEmail( $email) : array|null
    {
        if(!empty($email)){
           $stmt =  $this->connection->prepare("SELECT `id`,`email`,`password` FROM users where email = ? ");
           $stmt->bind_param('s',$email);
           $stmt->execute();
           return  $stmt->get_result()->fetch_assoc();
        }else{
            return null;
        }
    }
   }
