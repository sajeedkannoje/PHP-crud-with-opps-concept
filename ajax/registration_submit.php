<?php
    include_once(__DIR__ . '/../vendor/autoload.php');
    use Classes\Registration;
    $registration = new Registration;
    $response=  $registration->register($_POST);
    echo json_encode($response);
?>
