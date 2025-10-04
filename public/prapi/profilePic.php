<?php 
header('Content-type: application/json');
include "include/connect.php";

	$rawInput = file_get_contents("php://input");
	// Decode the JSON input
	$data = json_decode($rawInput);
	die($data);
    $subscriberId = $data->subscriberId; 
    $string = $data->result;
    $uploadpath   = 'profilePicture/';
    $file= $uploadpath . uniqid() . '.png';
 
    file_put_contents($file, base64_decode($string));

$url = "http://prarang.in/prapi/".$file; 

 
$sqlSubName= mysqli_query($dbconnect, "select * from msubscriberlist where subscriberId = '$subscriberId'");

if(mysqli_num_rows($sqlSubName) > 0)
{
	$subscribername = mysqli_fetch_assoc($sqlSubName);
	$name = $subscribername['name'];
	 
	if($url != '')
	{
		$sqlInsert= mysqli_query($dbconnect, "update msubscriberlist set profilePicUrl='$url' WHERE  subscriberId ='$subscriberId'");
		$sql = "select subscriberId,name,profilePicUrl from msubscriberlist WHERE subscriberId ='$subscriberId'";
	}
	
	//excecute SQL statement
	$result = mysqli_query($dbconnect, $sql);
 
	if(mysqli_num_rows($result) > 0)
	{
		$json['responseCode']="1";
		$json['message']="Success";
		$json['Payload']=mysqli_fetch_object($result);		
		echo json_encode($json,JSON_UNESCAPED_UNICODE);
	}
	else
	{
		$code = array('responseCode' => '0','message' => 'Record Not Found'); 
		echo json_encode($code);  
	} 		
	// die if SQL statement failed
	if (!$result) 
	{
	  http_response_code(404);
	  die(mysqli_error($dbconnect));
	}
	 
	// close mysqli connection
	mysqli_close($dbconnect);
}
else
{
	$code = array('responseCode' => '0','message' => 'Subscriber not found'); 
	echo json_encode($code);  
}

