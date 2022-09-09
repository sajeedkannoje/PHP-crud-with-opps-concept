<?php
include_once(__DIR__ . '/../vendor/autoload.php');
use Classes\Registration;
$registration = new Registration;
$response=  $registration->login($_POST);
echo json_encode($response);

?>
