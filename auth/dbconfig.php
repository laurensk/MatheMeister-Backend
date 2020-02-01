<?php

define('DB_SERVER', 'e96776-mysql.services.easyname.eu');
define('DB_USERNAME', 'u153590db7');
define('DB_PASSWORD', 'e6%vj4FvD6acVz#UWV{^B}62V');
define('DB_NAME', 'u153590db7');
 

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>