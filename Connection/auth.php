<?php
    session_start();
    if(!isset($_SESSION["user_id"])  && !isset($_SESSION["login"])  && $_SESSION["login"] !=true  ) {
        header("Location: log-in.php");
        exit();
    }
?>