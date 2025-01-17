<?php
@session_start();
date_default_timezone_set("Asia/Kolkata");
require_once "include/database.class.php";
require_once "include/function.php";
require_once "include/define.php";
date_default_timezone_set('Asia/Calcutta');
// Inactive after 60 mins in seconds
$inactive = 3600;
$_SESSION['timeout'] = time();
$session_life = time() - $_SESSION['timeout'];
if($session_life > $inactive && isset($_SESSION['timeout']))
{
	$url = "LogOut.php";
	echo redirectPage($url);
}
$HOSTNAME = "localhost";
//$USERNAME = "prarang";
//$PASSWORD = "#riversanskriti123#";
// $USERNAME = "prarang_1125";
// $PASSWORD = "123#prarang1125#123";
// $DATABASENAME = "prarang_riverSanskiriti";
// $servername = "localhost";
// $username = "prarangdb";
// $password = "PradbDec24";
// $dbname = "prarangdb";
$USERNAME = "prarang_DBDemo1";
$PASSWORD = "DBDemo1@786";
$DATABASENAME = "prarang_DBDemo1";
// $dbconnect = new DbConnect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASENAME);
// $dbconnect = mysqli_connect('localhost', 'prarangdb', 'PradbDec24', 'prarangdb');
$dbconnect = mysqli_connect('localhost', 'prarangdb', 'PradbDec24', 'prarangdb');
//$dbconnect->open();
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//$dbconnect->open();

?>
