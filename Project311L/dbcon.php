<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "cseProject311";


$connection = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($connection->connect_error) {
    die("Failed to connect to the database: " . $connection->connect_error);
}

?>
