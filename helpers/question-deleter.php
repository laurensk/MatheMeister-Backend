<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

require_once "../auth/dbconfig.php";

$que_id = $_GET["que_id"];

if ($que_id == null) {
    exitAndBack();
} else {
    $queId = $que_id;
}

$sth = mysqli_query($conn, "DELETE FROM `mm_questions` WHERE que_id =".$que_id);

exitAndBack();

function exitAndBack() {
    header("location: ../view-questions.php");
    exit;
}

?>