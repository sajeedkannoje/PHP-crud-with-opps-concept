<?php

namespace Classes;

include_once(__DIR__ . '/../vendor/autoload.php');

use Classes\Interfaces\FilterInterface;

class Filter implements FilterInterface
{
       public static function emailValidate($email): bool
       {
              return filter_var($email, FILTER_VALIDATE_EMAIL);
       }
       public static function emailSanitize($email): string
       {
              return filter_var($email, FILTER_SANITIZE_EMAIL);
       }
       public static function intValidate($int): bool
       {
              return filter_var($int, FILTER_VALIDATE_INT);
       }
       public static function intSanitize($int): string
       {
              return filter_var($int, FILTER_SANITIZE_NUMBER_INT);
       }
       public static function stringValidate($str): bool
       {
              return preg_match('/^[A-Za-z]*$/', $str);
       }
       public static function stringSanitize($str): string
       {
              return preg_replace('/[^A-Za-z0-9\-]/', '', $str);
       }
       public static function passwordValidate($password ,$filedName): array|bool
       {
              if (empty($password)) {
                     return [
                            'status' => 'false',
                            'field' => $filedName,
                            'error' => 'please enter password!'
                     ];
              }
              if (strlen($password) < 6) {
                     return [
                            'status' => 'false',
                            'field' => $filedName,
                            'error' => $filedName. ' must be greater then 6 character'
                     ];
              }
              return 1;
       }
       public static function checkPasswordWithConfirmPAssword($password, $cPassword) : bool
       {
             return ($password === $cPassword ) ? 1:0;
       }
}
