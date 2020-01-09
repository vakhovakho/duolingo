<?php
$db_server = "localhost";
$db_user = "root";
$db_password = null;
$db_database = "spanish";

$con = mysqli_connect($db_server, $db_user, $db_password, $db_database);

// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>