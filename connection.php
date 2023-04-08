<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
try {
$con = mysqli_connect($servername, $username, $password, $dbname);
}
catch (Exception $exception){
    var_dump($e);
}
// Check connection
if ($con -> connect_error){
    die("Connection failed: " . mysqli_connect_error());
}

