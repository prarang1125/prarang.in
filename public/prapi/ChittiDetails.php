<?php

   ini_set('display_errors', 1);
error_reporting(E_ALL);
 
header('Content-type: application/json');
include "include/connect.php";
//$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti'); 
//$link = mysqli_connect('localhost', 'prarang_1125', '#prarang1125#', 'prarang_riverSanskiriti'); 
@$ChittiId = BlockSQLInjection($_REQUEST['ChittiId']);
@$subcriberId = BlockSQLInjection($_REQUEST['SubscriberId']);
$languageCode = BlockSQLInjection($_REQUEST['languageCode']);
if($languageCode == 'en')
{
	$sqlLanguage = mysqli_fetch_array(mysqli_query($dbconnect, "select id from mlanguagescript WHERE language='English'"));
	$languageId = $sqlLanguage['id'];
}	
else if($languageCode == 'hi')
{
	$sqlLanguage = mysqli_fetch_array(mysqli_query($dbconnect, "select id from mlanguagescript WHERE language='Hindi'"));
	$languageId = $sqlLanguage['id'];
}		
if($ChittiId == '')
{
	$code = array('responseCode' => '0','message' => 'Record not Found'); 
	echo json_encode($code);
}
else
{ 
   			
	$sql ="select ch.chittiId,ch.description,ch.languageId,ch.dateOfApprove,IFNULL(cl.likes,0) as totalLike,IFNULL(chc.comment,0) as totalComment,IFNULL(cl2.isLiked,'false') as isLiked from `chitti` ch left join (select chittiId,count(id) as likes from `chittilike` where `isLiked`='true' GROUP BY chittiId) cl on ch.chittiId = cl.chittiId left join (select chittiId, count(id) as comment from `chitticomment` GROUP BY chittiId) chc on ch.chittiId = chc.chittiId left join (select chittiId, isLiked from `chittilike` where `subscriberId`='$subcriberId') cl2 on ch.chittiId = cl2.chittiId where ch.chittiId  = '$ChittiId' and ch.finalStatus='approved' GROUP BY ch.chittiId,ch.description,ch.languageId,ch.dateOfApprove ";

		$result = mysqli_query($dbconnect, $sql);
		$result1 = mysqli_query($dbconnect, $sql);
	
		if(mysqli_num_rows($result1) > 0)
		{			
			$json = array("responseCode" => "1",
						"message" => "Success",
						"subscriberId" => $subcriberId,
						"Payload" => array());
			for ($i=0;$i<mysqli_num_rows($result);$i++)
			{		
				$obj=mysqli_fetch_array($result); 
				$chitti = array();
				$chittiId1 = $obj["chittiId"];
				$languageId1 = $obj["languageId"];
				$sqlChittiGeography = mysqli_fetch_array(mysqli_query($dbconnect, "select * from chittigeographymapping  WHERE chittiId='$chittiId1'")); 
				$areaId = $sqlChittiGeography['areaId'];
				
					$sqlQueryArea= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from mcity where cityId ='$areaId'")); 
					if($languageId =='1')
					{
						$area = $sqlQueryArea['citynameInEnglish'];
					}
					else if($languageId =='2')	
					{
						$area = $sqlQueryArea['citynameInUnicode'];
					}
					$cityCode = $sqlQueryArea['cityCode'];
				
				$chitti["chittiId"] = $obj["chittiId"];
				$chitti["postType"] =  $cityCode;
				$chitti["chittiname"] =  $area;
				$chitti["dateOfApprove"] =  $obj["dateOfApprove"];
				$chitti["description"] =   $obj["description"];
				$chitti["url"] = "http://prarang.in/chittiDescription.php?chittiId=".$chitti["chittiId"];
				$chitti["isLiked"] = $obj["isLiked"];
				$chitti["totalLike"] = $obj["totalLike"];
				$chitti["totalComment"] = $obj["totalComment"];
				
				//getting chitti id to get image and tags
				$obj2=mysqli_fetch_object($result1);
				$chittiId = $obj2->chittiId;
				
				//getting images 
				 
				$sql3 ="select imageId,chittiId,imageUrl,isDefult from chittiimagemapping where chittiId = $chittiId  ORDER BY  imageId ASC";
				 	
				$resultImages1 = mysqli_query($dbconnect, $sql3);
				for($j=0; $j < mysqli_num_rows($resultImages1); $j++ )
				{
					$chitti['image'][$j]=mysqli_fetch_object($resultImages1);
				}
				 
				//getting tags 
				if($languageId =='1')
				{
				$sql4 = "select chittitagmapping.chittiId,mtag.tagId,mtag.tagInEnglish as tagUnicode,mtag.tagIcon from chittitagmapping inner join mtag on chittitagmapping.tagId  = mtag.tagId  WHERE chittitagmapping.chittiId = $chittiId ORDER BY  chittitagmapping.chittiId DESC";
				}	
				else if($languageId =='2')	
				{
				$sql4 = "select chittitagmapping.chittiId,mtag.tagId,mtag.tagInUnicode as tagUnicode,mtag.tagIcon from chittitagmapping inner join mtag on chittitagmapping.tagId  = mtag.tagId  WHERE chittitagmapping.chittiId = $chittiId ORDER BY  chittitagmapping.chittiId DESC";
				}
				 	
				$resultTag1 = mysqli_query($dbconnect, $sql4);
				for($k=0; $k < mysqli_num_rows($resultTag1); $k++ )
				{
					$chitti['tags'][$k]=mysqli_fetch_object($resultTag1);
				}					
				 
			    array_push($json["Payload"], $chitti);
			}
			
			//print_r($json);
		    echo json_encode($json,JSON_UNESCAPED_UNICODE);
		}
		else
		{
			if($languageId =='1')
			{
				$code = array('responseCode' => '0','message' => 'Sorry no letters here, pick another geography!');
			}
			else if($languageId =='2')	
			{
				$code = array('responseCode' => '0','message' => 'माफ़ करे पत्र उपलब्ध नही है, दूसरा भुगोल चुने।');
			}	
			echo json_encode($code);  
		}
		
		// die if SQL statement failed
		if (!$result1) 
		{
		  http_response_code(404);
		  die(mysqli_error($dbconnect));
		}
		 
		// close mysqli connection
		mysqli_close($dbconnect);
	  
}	
