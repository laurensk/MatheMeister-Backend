<?php

/*
HELPERS: ERROR
-----
This script echos a error code and description and is
only directly used by setup.php and hlp-check-api-key.php.
*/

// helper function for errors
function error_util($code, $desc) {
    http_response_code(403);
    $errorJson = array("error_code"=>$code, "error_desc"=>$desc);
    echo json_encode($errorJson);
}

?>