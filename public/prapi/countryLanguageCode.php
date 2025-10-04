<?php 
include "include/connect.php";
header('Content-type: application/json;charset=utf-8');
//$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti'); 
//$link = mysqli_connect('localhost', 'prarang_1125', '#prarang1125#', 'prarang_riverSanskiriti');
$languageCode = BlockSQLInjection($_REQUEST['languageCode']); 
 
if($languageCode != '') 
{
    if($languageCode == 'en')
	{ 
		$sql = "select countryCode,countryNameInEnglish as languageUnicode from mcountry "; 
	}
    else if($languageCode == 'hi')
	{
		$sql = "select countryCode,countryNameInUnicode as languageUnicode from mcountry "; 
	}	 
	$result = mysqli_query($dbconnect,$sql);
	 
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
} 
else
{
	$code = array('responseCode' => '0','message' => 'Record Not Found'); 
	echo json_encode($code);  
} 	
// close mysql connection
mysqli_close($dbconnect);


 
