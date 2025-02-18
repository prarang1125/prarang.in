<?php
$servername = "localhost";
$username = "prarangdb";
$password = "PradbDec24";
$dbname = "prarangdb";
// global $conn;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
