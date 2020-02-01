<?php

$mode = $_GET["mode"];

include('../auth/dbconfig.php');

// get ? questions for level ?
if ($mode == 1) {

    $queLvl = $_GET["queLvl"];
    $queCount = $_GET["queCount"];

    if ($queLvl == null || $queCount == null) { error(); }

    $sth = mysqli_query($conn, "SELECT * FROM `mm_questions` WHERE que_level = ".$queLvl." ORDER BY RAND() LIMIT ".$queCount);
    $rows = array();
    while($r = mysqli_fetch_assoc($sth)) {
        $rows[] = $r;
    }
    print json_encode($rows);

    exit;
} else

// get ? questions for level rand()
if ($mode == 2) {

    $queCount = $_GET["queCount"];

    if ($queCount == null) { error(); }

    $sth = mysqli_query($conn, "SELECT * FROM `mm_questions` ORDER BY RAND() LIMIT ".$queCount);
    $rows = array();
    while($r = mysqli_fetch_assoc($sth)) {
        $rows[] = $r;
    }
    print json_encode($rows);

    exit;
} else

// get all questions
if ($mode == 3) {

    $sth = mysqli_query($conn, "SELECT * FROM `mm_questions`");
    $rows = array();
    while($r = mysqli_fetch_assoc($sth)) {
        $rows[] = $r;
    }
    print json_encode($rows);

    exit;
} else

// if no mode is given
{
    error();
}

function error() {
    echo "Uups! Something went wrong. Sadly, there is no API documentation so keep guessing!";
    exit;
}

?>