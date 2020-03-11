<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

require_once "../db/dbconfig.php";

$que_lvl = mysqli_real_escape_string($conn, $_POST["level"]);
$que_question = mysqli_real_escape_string($conn, $_POST["question"]);
$que_correctAnswer = mysqli_real_escape_string($conn, $_POST["correctAnswer"]);
$que_wrongAnswerOne = mysqli_real_escape_string($conn, $_POST["wrongAnswerOne"]);
$que_wrongAnswerTwo = mysqli_real_escape_string($conn, $_POST["wrongAnswerTwo"]);
$que_wrongAnswerThree = mysqli_real_escape_string($conn, $_POST["wrongAnswerThree"]);
$que_catId = mysqli_real_escape_string($conn, $_POST["category"]);

$sth = sprintf("INSERT INTO mm_questions set que_level='%s', que_question='%s', que_correctAnswer='%s', que_wrongAnswerOne='%s', que_wrongAnswerTwo='%s', que_wrongAnswerThree='%s', que_catId='%s'", $que_lvl, $que_question, $que_correctAnswer, $que_wrongAnswerOne, $que_wrongAnswerTwo, $que_wrongAnswerThree, $que_catId);

if ($conn->query($sth) === TRUE) {
    exitAndBack();
} else {
    exitAndBack();
}

function exitAndBack() {
    header("location: ../view-questions.php");
    exit;
}

?>