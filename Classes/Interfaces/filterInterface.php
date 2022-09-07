<?php

namespace Classes\Interfaces;

interface FilterInterface
{
  public  static function emailValidate($email): bool;
  public  static function emailSanitize($email): string;
  public  static function intValidate($int): bool;
  public  static function intSanitize($int): string;
  public static  function stringValidate($str): bool;
  public static function stringSanitize($str): string;
  public static function passwordValidate($password,$filedName ): array|bool;
  public static function checkPasswordWithConfirmPAssword($password, $cPassword) : bool;
}
