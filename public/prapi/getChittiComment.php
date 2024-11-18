<?php 
header('Content-type: application/json');
include "include/connect.php";
//$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti'); 
//$link = mysqli_connect('localhost', 'prarang_1125', '#prarang1125#', 'prarang_riverSanskiriti');
$chittiId = BlockSQLInjection($_REQUEST['chittiId']); 
$languageCode = BlockSQLInjection($_REQUEST['languageCode']); 
if( $chittiId != '' )
{			
	$sql="select id,subscriberId,name,chittiId,Comment,imageUrl from chitticomment  where chittiId ='$chittiId' and isActive=1 order by id desc"; 
	//excecute SQL statement
	$result = mysqli_query($dbconnect, $sql);
   
    if(mysqli_num_rows($result) > 0)
    {
 
		$json = array("responseCode" => "1",
				"message" => "Success", 
				"Payload"=> array());
		for($i=0;$i< mysqli_num_rows($result); $i++)
		{	
			$obj=mysqli_fetch_array($result); 
			$image = array();
			$image["id"] = $obj["id"];
			$image["subscriberId"] = $obj["subscriberId"];		
			$image["name"] = $obj["name"];
			
			$subscriberId = $obj["subscriberId"];
			$sqlprofilepic= mysqli_fetch_assoc(mysqli_query($dbconnect, "select profilePicUrl from msubscriberlist where subscriberId='$subscriberId'"));
			$image["profilePic"] = $sqlprofilepic['profilePicUrl'];
			 	
			$image["chittiId"] = $obj["chittiId"];
			$image["Comment"] = utf8_decode($obj["Comment"]);
			if($obj["imageUrl"] != '')
			{
				$image["imageUrl"] = $obj["imageUrl"];
			}
			
			array_push($json["Payload"], $image);
			
		}	
	    echo json_encode($json,JSON_UNESCAPED_UNICODE);
	    //print_r($json);
	    
    }
    else
    {
		if($languageCode == 'en')
		{
		$code = array('responseCode' => '1','message' => 'No record found!'); 
		}
		else if($languageCode == 'hi')
		{
		$code = array('responseCode' => '0','message' => 'रिकॉर्ड उपलब्ध नहीं है।');	
		}
		echo json_encode($code);
    } 		
	
}
 

// close mysqli connection
mysqli_close($dbconnect);