<?php 
header('Content-type: application/json'); 
include "include/connect.php";
//$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti');
//$link = mysqli_connect('localhost', 'prarang_1125', '#prarang1125#', 'prarang_riverSanskiriti');
@$languageId = BlockSQLInjection($_REQUEST['languageCode']);
@$subscriberId = BlockSQLInjection($_REQUEST['SubscriberId']);
@$filterApply = BlockSQLInjection($_REQUEST['filterApply']);
@$geographyCode = BlockSQLInjection($_REQUEST['geographyCode']);
@$reportDate = date("d-m-Y");
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
if($filterApply == 1)
{ 
	
}
else
{
	mysqli_query($dbconnect, "insert into visitCount set subscriberId ='$subscriberId',dateTime='$reportDate'");
}	
if($geographyCode == '0'){
	$json = array("responseCode" => "1",
	"message" => "Success", 
	"natureCount" => 0,
	"cultureCount" => 0,
	"Payload" => array());
// 	$tags["tagCategoryId"] =0;
// 	$tags["tagCategoryInUnicode"] =0;
// 	$tags["totalPost"] = 0; 
// 	array_push($json["Payload"], $tags);
	echo json_encode($json,JSON_UNESCAPED_UNICODE);
}else{
	if($languageId == 'en')
	{
		$sql ="select tc.`tagCategoryId`,tc.`tagCategoryInEnglish` as tagCategoryInUnicode, IFNULL(tg.tagcount,0) as totalTag from `mtagcategory` tc left join (select tagCategoryId,count(tagId) as tagcount from `mtag` GROUP BY tagCategoryId) tg on tc.`tagCategoryId` = tg.tagCategoryId GROUP BY tc.tagCategoryId,tc.tagCategoryInUnicode ORDER BY tc.tagCategoryId ASC";
	} 
	else if($languageId == 'hi')
	{
		$sql ="select tc.`tagCategoryId`,tc.`tagCategoryInUnicode`, IFNULL(tg.tagcount,0) as totalTag from `mtagcategory` tc left join (select tagCategoryId,count(tagId) as tagcount from `mtag` GROUP BY tagCategoryId) tg on tc.`tagCategoryId` = tg.tagCategoryId GROUP BY tc.tagCategoryId,tc.tagCategoryInUnicode ORDER BY tc.tagCategoryId ASC";
	}
	// echo "SELECT COUNT(DISTINCT cm.chittiId) as totalCulturePost from chittitagmapping cm inner join chittigeographymapping cg on cm.chittiId = cg.chittiId inner join chitti c on c.chittiId = cg.chittiId inner join mtag mt on mt.tagId = cm.tagId  WHERE cg.areaId='2' and cg.geographyId='3' and mt.tagCategoryId IN (1,2,3) and c.finalStatus='approved'";
	$cultureCount = mysqli_fetch_array(mysqli_query($dbconnect, "SELECT COUNT(DISTINCT cm.chittiId) as totalCulturePost from chittitagmapping cm inner join chittigeographymapping cg on cm.chittiId = cg.chittiId inner join chitti c on c.chittiId = cg.chittiId inner join mtag mt on mt.tagId = cm.tagId  WHERE (cg.areaId='$areaId' and cg.geographyId='$geographyId') and mt.tagCategoryId IN (1,2,3) and c.finalStatus='approved'")); 
	
	$totalCulturePost = $cultureCount['totalCulturePost']; 
	
	if(is_null($totalCulturePost))
	{
		$totalCulturePost = 0;
	}
	
	
	// echo "SELECT COUNT(DISTINCT cm.chittiId) as totalNaturePost from chittitagmapping cm inner join chittigeographymapping cg on cm.chittiId = cg.chittiId inner join chitti c on c.chittiId = cg.chittiId inner join mtag mt on mt.tagId = cm.tagId  WHERE (cg.areaId='2' and cg.geographyId='3') and mt.tagCategoryId IN (4,5,6) and c.finalStatus='approved'";
	$natureCount = mysqli_fetch_array(mysqli_query($dbconnect, "SELECT COUNT(DISTINCT cm.chittiId) as totalNaturePost from chittitagmapping cm inner join chittigeographymapping cg on cm.chittiId = cg.chittiId inner join chitti c on c.chittiId = cg.chittiId inner join mtag mt on mt.tagId = cm.tagId  WHERE (cg.areaId='$areaId' and cg.geographyId='$geographyId') and mt.tagCategoryId IN (4,5,6) and c.finalStatus='approved'")); 
	

	$totalNaturePost = $natureCount['totalNaturePost']; 
	if(is_null($totalNaturePost))
	{
		$totalNaturePost = 0;
	}
	// excecute SQL statement
	$result = mysqli_query($dbconnect,$sql); 

	if(mysqli_num_rows($result) > 0)
	{			
		$json = array("responseCode" => "1",
					"message" => "Success", 
					"natureCount" => $totalNaturePost,
					"cultureCount" => $totalCulturePost,
					"Payload" => array());
				for ($i=0;$i<mysqli_num_rows($result);$i++)
				{		
					$obj=mysqli_fetch_array($result); 
					$tags = array();
					
					$tagCatId= $obj["tagCategoryId"];
					
					$sqlTagList = mysqli_query($dbconnect, "SELECT * FROM mtag WHERE tagCategoryId =  '$tagCatId'"); 

					$y = 0;
					$tagIdList = array();

					$countt1=mysqli_num_rows($sqlTagList);	
					if($countt1 > 0)
					{
						while($displayTagList = mysqli_fetch_array($sqlTagList))
						{
							// echo $displayTagList['tagId'];
							// echo '<br> raheg';
							$tagIdList[$y] = $displayTagList['tagId'];
							$y++;
						}
					@$tagList= join(',',$tagIdList);
					}
					
					
					
					// echo "SELECT COUNT(DISTINCT cm.chittiId) as totalPost from chittitagmapping cm inner join chittigeographymapping cg on cm.chittiId = cg.chittiId inner join chitti c on c.chittiId = cg.chittiId WHERE (cg.areaId='3' and cg.geographyId='2') and cm.tagId IN ($tagList) and c.finalStatus='approved'";
					$sqlTagList = mysqli_fetch_array(mysqli_query($dbconnect, "SELECT COUNT(DISTINCT cm.chittiId) as totalPost from chittitagmapping cm inner join chittigeographymapping cg on cm.chittiId = cg.chittiId inner join chitti c on c.chittiId = cg.chittiId WHERE (cg.areaId='$areaId' and cg.geographyId='$geographyId') and cm.tagId IN ($tagList) and c.finalStatus='approved'"));
					
					

					$tags["tagCategoryId"] = $obj["tagCategoryId"];
					$tags["tagCategoryInUnicode"] = $obj["tagCategoryInUnicode"];
					$tags["totalPost"] = $sqlTagList['totalPost']; 
					if(is_null($tags["totalPost"]))
					{
						$tags["totalPost"] = 0;
					}
					
					
					array_push($json["Payload"], $tags);
				}	
				//print_r($json);
				echo json_encode($json,JSON_UNESCAPED_UNICODE);
	}else{
		$code = array('responseCode' => '0','message' => 'No result found'); 
		echo json_encode($code);  
	}
	 
}

	// close mysqli connection
	mysqli_close($dbconnect);

 


