<?php
//Databasetilkobling
$server_name = "localhost";
$db_username = "broen";
$db_password = "777-bakre-hekt-Ydmyk-Feita";
$db_name = "broen";

$connection = mysqli_connect($server_name, $db_username, $db_password, $db_name);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
