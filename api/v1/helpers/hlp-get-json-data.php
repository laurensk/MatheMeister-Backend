<?php

/*
GET-JSON-DATA SCRIPT
-----
This script gets the json data from the POST request and is
only directly used by setup.php and hlp-check-api-key.php.
*/

$json = file_get_contents('php://input');
$data = json_decode($json,true);

?>