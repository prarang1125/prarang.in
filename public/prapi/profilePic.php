<?php 
header('Content-type: application/json');
include "include/connect.php";
//$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti');
//$link = mysqli_connect('localhost', 'prarang_1125', '#prarang1125#', 'prarang_riverSanskiriti');
//$subscriberId = BlockSQLInjection($_REQUEST['subscriberId']); 
//print_r($_REQUEST);exit();
//$date = date("d-m-Y H:i:s"); 
//$string = $_REQUEST['result'];
/*$exp=explode(".",$string);
$fileName = $exp[0];
$ext = $exp[1];*/
    @$data = json_decode(file_get_contents("php://input"));
    $subscriberId = $data->subscriberId; 
    $string = $data->result;
    $uploadpath   = 'profilePicture/';
    $file= $uploadpath . uniqid() . '.png';
    //$json['base64string']=$base64string;
    //$json['uploadpath']=$uploadpath;
    //$json['parts']=$parts;
    //$json['imageparts']=$imageparts;
    //$json['imagetype']=$imagetype;
    //$json['imagebase64']=$imagebase64;
    //$json['file']=$file;
    file_put_contents($file, base64_decode($string));
    //file_put_contents($file, $imagebase64);

//$uploaddir = 'profilePicture/';
//$uploadfile = $uploaddir .  $fileName."_".time().".".$ext;
$url = "http://prarang.in/prapi/".$file; 
//move_uploaded_file($_FILES['profilePic']['tmp_name'], $uploadfile);
//$fileName = $_FILES["profilePic"]["name"];

 
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