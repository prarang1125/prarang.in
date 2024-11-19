<?php 
header('Content-type: application/json'); 
include "include/connect.php";
//$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti');
//$link = mysqli_connect('localhost', 'prarang_1125', '#prarang1125#', 'prarang_riverSanskiriti');
@$subscriberId = BlockSQLInjection($_REQUEST['SubscriberId']);
@$languageId = BlockSQLInjection($_REQUEST['languageCode']); 
@$categoryId = BlockSQLInjection($_REQUEST['categoryId']); 
@$geographyCode = BlockSQLInjection($_REQUEST['geographyCode']);
switch($geographyCode){
	case "c2":
		$areaId=2;
		$geographyId=2;
		break;
	case "c3":
		$areaId=3;
		$geographyId=2;
		break;
	case "c4":
		$areaId=4;
		$geographyId=2;
		break;
	case "r4":
		$areaId=4;
		$geographyId=3;
		break;
	case "0":
		$areaId=0;
		$geographyId=0;
		break;
		
}

if($languageId == '' and $categoryId == '')
{
	$code = array('responseCode' => '0','message' => 'Record Not Found'); 
	echo json_encode($code); 
}
else
{
	if($languageId == 'en')
	{
	  $sql ="select tagId,tagInEnglish as tagInUnicode,tagIcon from `mtag` where tagCategoryId ='$categoryId'";
	} 
	else if($languageId == 'hi')
	{
	  $sql ="select tagId,tagInUnicode,tagIcon from `mtag`  where tagCategoryId ='$categoryId'";
	}
	$result = mysqli_query($dbconnect, $sql); 

	if(mysqli_num_rows($result) > 0)
	{			
		$json = array("responseCode" => "1",
					"message" => "Success", 
					"Payload" => array());
		for ($i=0;$i<mysqli_num_rows($result);$i++)
		{		
			$obj=mysqli_fetch_array($result); 
			$tags = array();
			$tags["tagId"] = $obj["tagId"];
			$tagId = $obj["tagId"];
			$sqlPostCount = mysqli_fetch_array(mysqli_query($dbconnect, "SELECT COUNT(DISTINCT cm.chittiId) as totalPost from chittitagmapping cm inner join chittigeographymapping cg on cm.chittiId = cg.chittiId inner join chitti c on c.chittiId = cg.chittiId WHERE (cg.geographyId = '$geographyId' and cg.areaId ='$areaId') and cm.tagId IN ($tagId) and c.finalStatus='approved'"));
			
			$postCount = $sqlPostCount['totalPost']; 
			if($postCount < 1)
			{
				$postCount = 0;
			}
			
			$tags["tagInUnicode"] = $obj["tagInUnicode"]." (".$postCount.")";
			$tags["tagIcon"] = $obj["tagIcon"]; 	
			array_push($json["Payload"], $tags);
		}	
		//print_r($json);
		echo json_encode($json,JSON_UNESCAPED_UNICODE);
	}
	else
	{
		$code = array('responseCode' => '0','message' => 'Record not found'); 
		echo json_encode($code);  
	}	 
	// close mysqli connection
	mysqli_close($dbconnect);
} 
 


 


