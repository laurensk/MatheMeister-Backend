<?php

/*
HELPERS: ERROR
-----
This script echos a error code and description and is
only directly used by setup.php and hlp-check-api-key.php.
*/

// helper function to echo an error code and a message as json
function error_util($message, $code) {
    $output = "error ".$code.": ".$message;
    $jsonOutput = json_encode($output);
    echo $jsonOutput;
} 

?>