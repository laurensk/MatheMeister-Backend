<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

require_once "../db/dbconfig.php";

$cat_name = mysqli_real_escape_string($conn, $_POST["cat_name"]);

$sth = sprintf("INSERT INTO mm_category set cat_name='%s'", $cat_name);

if ($conn->query($sth) === TRUE) {
    exitAndBack();
} else {
    exitAndBack();
}

function exitAndBack() {
    header("location: ../view-categories.php");
    exit;
}

?>