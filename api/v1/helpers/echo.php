<?php

/*
HELPERS: ECHO
-----
This script echos a string in json format and is
only directly used by setup.php and hlp-check-api-key.php.
*/

// helper function to echo as json
function echo_util($message) {
    $jsonOutput = json_encode($message);
    echo $jsonOutput;
} 

?>