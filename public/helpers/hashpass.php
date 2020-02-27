<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

$password = $_REQUEST['password'];
echo password_hash($password, PASSWORD_DEFAULT);

?>