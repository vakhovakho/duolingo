<?php

$con = mysqli_connect("localhost","root",null,"spanish");

// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$checked = $_POST['checked'] === 'true' ? 1 : 0;

$id = $_POST['translationId'];

$sql = "UPDATE translations
        SET forgot = $checked
        WHERE id = $id";

if ($con->query($sql) !== TRUE) {
    echo $con->connect_error;    
}

echo "success";