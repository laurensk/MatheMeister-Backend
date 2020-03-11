<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

$password = $_GET['password'];
echo password_hash($password, PASSWORD_DEFAULT);

?> 