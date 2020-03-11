<?php

/*
MATHEMEISTER-DBCONFIG
-----
This script is establishing a database connection.
If the connection fails, exit with die().
*/

// define database credentials
define('DB_SERVER', 'e96776-mysql.services.easyname.eu');
define('DB_USERNAME', 'u153590db7');
define('DB_PASSWORD', 'e6%vj4FvD6acVz#UWV{^B}62V');
define('DB_NAME', 'u153590db7');
 
// connect to the database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// set the charset to utf8
mysqli_query($conn, "SET NAMES 'utf8'");
 
// if the connection has failed, exit with die()
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>