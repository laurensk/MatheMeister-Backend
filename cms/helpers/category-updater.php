<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

require_once "../db/dbconfig.php";

$catId = mysqli_real_escape_string($conn, $_POST["cat_id"]);
$catName = mysqli_real_escape_string($conn, $_POST["cat_name"]);

$sth = sprintf("UPDATE mm_category set cat_name='%s' where cat_id = '%s'", $catName, $catId);

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