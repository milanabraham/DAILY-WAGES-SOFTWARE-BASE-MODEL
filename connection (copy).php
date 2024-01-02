<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Sam";

$conn = mysql_connect($servername, $username, $password);
$db = mysql_select_db($database,$conn);

if (!$db) {
    die("Connection failed: " . mysql_error());
}
session_start();
?>