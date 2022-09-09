<?php
namespace Classes\Interfaces;

  interface RegistrationInterface {
    public  function register($data);
    public  function login($data);
    public  function store($data);
  }

?>
