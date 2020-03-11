<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

require_once "../db/dbconfig.php";

$cat_id = $_GET["cat_id"];

if ($cat_id == null) {
    exitAndBack();
}

$ifzeroSth = sprintf("SELECT * FROM mm_questions WHERE que_catId = '%s'", $cat_id);
$ifzeroRes = $conn->query($ifzeroSth);
if ($ifzeroRes->num_rows >= 1) {
    exitAndBack();
}

$sth = mysqli_query($conn, "DELETE FROM `mm_category` WHERE cat_id =".$cat_id);

exitAndBack();

function exitAndBack() {
    header("location: ../view-categories.php");
    exit;
}

?>