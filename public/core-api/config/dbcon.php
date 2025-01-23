<?php
$servername = "localhost";
$username = "prarang_1125";
$password = "123#prarang1125#123";
$dbname = "prarang_riverSanskiriti";
// global $conn;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}