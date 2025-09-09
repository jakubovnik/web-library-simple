<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simple-library";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
require "php/dbconnect.php";
$sql = "SELECT * FROM `type` ORDER BY id";
$result = $conn->query($sql);
$conn->close();
*/
?>