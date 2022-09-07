<?php

namespace Classes;

include_once(__DIR__ . '/../vendor/autoload.php');

use Classes\Interfaces\RegistrationInterface;
use Connection\Connection;
use Classes\Filter;

class Registration extends Connection  implements RegistrationInterface
{
    public function __construct()
    {
        parent::__construct();
    }
    public  function register($data)
    {
        if (!Filter::emailSanitize($data['email'])) {
            return [
                'status' => 'false',
                'field' => 'email',
                'error' => 'not a valid email!'
            ];
        }
        if (!Filter::intValidate($data['phone'])) {
            return [
                'status' => 'false',
                'field' => 'phone',
                'error' => 'not a valid phone!'
            ];
        }
        if (!Filter::stringValidate($data['first_name'])) {
            return [
                'status' => 'false',
                'field' => 'first name',
                'error' => 'not a valid name!'
            ];
        }
        if (!Filter::stringValidate($data['last_name'])) {
            return [
                'status' => 'false',
                'field' => 'last name',
                'error' => 'not a valid name!'
            ];
        }
        $passwordValidate =  Filter::passwordValidate($data['password'], 'password');
        $c_passwordValidate =  Filter::passwordValidate($data['c_password'], 'c_password');
        if (isset($passwordValidate['status']) && $passwordValidate['status'] == 'false') {
            return $passwordValidate;
        }
        if (isset($c_passwordValidate['status']) && $c_passwordValidate['status'] == 'false') {
            return $c_passwordValidate;
        }
        if (!Filter::checkPasswordWithConfirmPAssword($data['password'], $data['c_password'])) {
            return [
                'status' => 'false',
                'field' => 'password',
                'error' => 'password and confirm password not matched!'
            ];
        }
        $email = Filter::emailSanitize($data['email']);
        $first_name = Filter::stringSanitize($data['first_name']);
        $last_name = Filter::stringSanitize($data['last_name']);
        $phone = Filter::intSanitize($data['phone']);
        $password  = password_hash($data['password'], PASSWORD_DEFAULT);
        $role_id = 2; // 2 is for normal user
        $response =  self::store(compact('email', 'first_name', 'last_name', 'phone', 'password', 'role_id'));
        if ($response['status'] === true) {
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $response['user_id'];
            return [
                'status' => 'true'
            ];
        } else {
            return  $response;
        }
    }
    public  function login()
    {
        echo "hello";
    }
    public  function store($data)
    {
        try {
            $stmt = $this->connection->prepare('SELECT COUNT(email) AS EmailCount FROM users WHERE email =? ');
            $stmt->bind_param('s', $data['email']);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows >= 1) {
                return [
                    'status' => false,
                    'message' => "email already exist"
                ];
            } else {
                $stmt = $this->connection->prepare("INSERT INTO users (first_name,last_name,email,phone,password,role_id) VALUE (?,?,?,?,?,? ) ");
                $stmt->bind_param('sssisi', $data['first_name'], $data['last_name'], $data['email'], $data['phone'], $data['password'], $data['role_id']);
                if ($stmt->execute()) {
                    return [
                        'status' => true,
                        'user_id' => $stmt->insert_id
                    ];
                } else {
                    return [
                        'status' => false,
                        'message' => 'something went wrong'
                    ];
                }
            }
        } catch (\Throwable $th) {
        }
    }
}
