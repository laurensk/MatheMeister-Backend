<?php

/*
SETUP SCRIPT
-----
This script must be required at the beginning of each api-file
because it's validating the api-key, includes all helper functions
and gets the json data from the POST request as a php array.
*/

// include all helper files
require "includes.php";

// get json data
require "hlp-get-json-data.php";

// get a database connection
require "./db/mm-dbconfig.php"

?>