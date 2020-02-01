<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

require_once "../auth/dbconfig.php";

$que_lvl = urldecode(mysqli_real_escape_string($conn, $_GET["que_lvl"]));
$que_question = urldecode(mysqli_real_escape_string($conn, $_GET["que_question"]));
$que_correctAnswer = urldecode(mysqli_real_escape_string($conn, $_GET["que_correctAnswer"]));
$que_wrongAnswerOne = urldecode(mysqli_real_escape_string($conn, $_GET["que_wrongAnswerOne"]));
$que_wrongAnswerTwo = urldecode(mysqli_real_escape_string($conn, $_GET["que_wrongAnswerTwo"]));
$que_wrongAnswerThree = urldecode(mysqli_real_escape_string($conn, $_GET["que_wrongAnswerThree"]));

$sth = "INSERT INTO `mm_questions` (que_level, que_question, que_correctAnswer, que_wrongAnswerOne, que_wrongAnswerTwo, que_wrongAnswerThree) VALUES ('$que_lvl', '$que_question', '$que_correctAnswer', '$que_wrongAnswerOne', '$que_wrongAnswerTwo', '$que_wrongAnswerThree')";

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