<?php 
include "include/connect.php";
//$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti');
//$link = mysqli_connect('localhost', 'prarang_1125', '#prarang1125#', 'prarang_riverSanskiriti');
mysqli_set_charset($dbconnect, 'utf8');

$request = $_SERVER['QUERY_STRING']; 
if (strpos($request, '=')) 
{
    $n=split("=",$request);
	$table =$n[0];
	$offset =$n[1];
}
else
{
	$table = $request;
	$offset = 0;
}
$key = $offset;
 
$sql = "select id,languageUnicode,language from `$table`".($key?" WHERE id=$key":''); 
 
$result = mysqli_query($dbconnect, $sql);
 
if(mysqli_num_rows($result) > 0)
{
	$json['responseCode']="1";
	$json['message']="Success";
	$json['Payload']=array();
	for ($i=0;$i<mysqli_num_rows($result);$i++) 
	{ 		 
		$json['Payload'][$i] = mysqli_fetch_object($result);
	} 
	echo json_encode($json,JSON_UNESCAPED_UNICODE);
}
else
{
	$code = array('responseCode' => '0','message' => 'Record not found'); 
	echo json_encode($code);  
}
 
// close mysql connection
mysqli_close($dbconnect);