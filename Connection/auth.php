<?php
    include_once(__DIR__ . '/../vendor/autoload.php');
    use Classes\User;
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if( !isset($_SESSION["user_id"])  && !isset($_SESSION["login"])  ) {
        // if (headers_sent() === false && basename($_SERVER['SCRIPT_FILENAME']) != 'log-in.php' )
        // {
        //     header('Location:log-in.php');
        //     die;
        // }
    }else if( isset($_SESSION["user_id"])  &&  isset($_SESSION["login"])  ){
        $user =  new User();
        $user = $user->getById($_SESSION['user_id']);
        // if (headers_sent() === false &&  basename($_SERVER['SCRIPT_FILENAME']) != 'index.php' )
        // {
        //     header('Location:index.php');
        //     die;
        // }
    }
?>
