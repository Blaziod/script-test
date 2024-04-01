<?php

@define('DB_SERVER', 'localhost');
@define('DB_USERNAME', 'u648879050_speed');
@define('DB_PASSWORD', 'Iamgreat8?');
@define('DB_NAME', 'u648879050_speed');

 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>

