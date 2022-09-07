<?php
namespace Classes\Interfaces;

  interface RegistrationInterface {
    public  function register($data);
    public  function login();
    public  function store($data);
  }

?>
