<?php
// establishing the variables needed for a connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simple-library";

$conn = new mysqli($servername, $username, $password, $dbname); // attempting connection
if ($conn->connect_error) { // checks for errors, kills this process (thus also any page that "requires" it) if there are any errors and outputs an error message
    die("Connection failed: " . $conn->connect_error);
}
/* This commented part is here just because I frequently copy/paste it
require "php/dbconnect.php";
$sql = "SELECT * FROM `type` ORDER BY id";
$result = $conn->query($sql);
$conn->close();
*/
?>