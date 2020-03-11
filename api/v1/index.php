<?php

/*
INDEX.PHP
-----
This script checks the api key and then requires the
wanted script using the 'action' field from the json data.
*/

require "helpers/setup.php";

$action = $data["action"];

if (empty(trim($action))) {
    noActionGiven($conn);
}

switch($action) {
    case "ten-for-level":
        require "api/ten-for-level.php";
    break;
    case "ten-for-category":
        require "api/ten-for-category.php";
    break;
    case "get-categories":
        require "api/get-categories.php";
    break;
    default:
        noActionGiven($conn);
}

function noActionGiven($conn) {
    echo_util("invalid action given");
    $conn->close();
    exit;
}

?>