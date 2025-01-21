<?php
session_start(); // Start session securely
date_default_timezone_set("Asia/Kolkata"); // Set timezone

// Include required files
require_once "include/database.class.php";
require_once "include/function.php";
require_once "include/define.php";

// Inactive after 60 mins (3600 seconds)
$inactive = 3600;

// Check session timeout
if (isset($_SESSION['timeout']) && (time() - $_SESSION['timeout'] > $inactive)) {
    $url = "LogOut.php";
    echo redirectPage($url);
    exit;
}
$_SESSION['timeout'] = time(); // Reset session timeout

// Database configuration
$HOSTNAME = "localhost";
$USERNAME = "vivek";
$PASSWORD = "phpmyadmin";
$DATABASENAME = "newprarang";

// Establish database connection
$dbconnect = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASENAME);

// Check connection
if (!$dbconnect) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Database connection is successful
// echo "Database connection established successfully.";
// die();
?>

