<?php
function reLoad() 
{
	$reload.= "<script language=\"javascript\">";
	$reload.= "window.close(); \n";
	$reload.= "window.opener.location.reload(); \n";
	$reload.= "</script>";
	return $reload;
}
function redirectPage($url) 
{
	echo "<script language=\"javascript\">";
	echo  "window.location = '".$url."';";
	echo  "</script>";
	
}
function alertBox($msg, $url) 
{
	$alertBox.= "<script language=\"javascript\">";
	$alertBox.= "alert('".$msg."');";
	$alertBox.= "window.location = '".$url."';";
	$alertBox.= "</script>";
	return $alertBox;
}
function changeQuote($str) 
{
	$changeStr = str_replace('"', '&quot;', $str);
	$changeStr = str_replace("'", "&#039;", $changeStr);
	return $changeStr;
}
function showDateFormat() 
{
	return date("d M, Y");
}
function showDateFormatDay() {
	return date("D d M, Y");
}
function changeDateFormat($date) {
	return date("d M, Y", strtotime($date));
}
function changeDateFormatDay($date) {
	return date("D d M, Y", strtotime($date));
}
function invokeSqlInject($data) {
	return mysql_real_escape_string(strip_tags($data));
}
function removeSlash($data) {
	$replaceData=trim("\ ");
	$string=str_replace($replaceData, "", $data);
	//$string.=str_replace("/ ", "", $string);
	return $string;
}
function encryptData($data) {	
	$string=sha1($data);
	return $string;
}

function getExtension($str) {
	$str = trim($str);
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext = substr($str, $i+1, $l);
	return strtolower($ext);
}
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
$page_url=curPageName();

// ============== Block sql injection for authentication ===========//

function BlockSQLInjectionLogin($str) 
{ 
return strip_tags(str_replace('DELETE FROM','',str_replace('DROP TABLE','',str_replace('=','',str_replace('"','',str_replace("'","",$str))))));
}

//=================== Block SQL Injection for all other scenarios ===================
function BlockSQLInjection($str) 
{ 
return str_replace('DELETE FROM','',str_replace('DROP TABLE','',str_replace('=','',$str)));
}
?>
