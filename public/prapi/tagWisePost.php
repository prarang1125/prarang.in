<?php 
header('Content-type: application/json'); 
include "include/connect.php";
//$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti'); 
//$link = mysqli_connect('localhost', 'prarang_1125', '#prarang1125#', 'prarang_riverSanskiriti');
@$tagId = BlockSQLInjection($_REQUEST['tagId']); 
@$subscriberId = BlockSQLInjection($_REQUEST['subscriberId']); 
@$offset = BlockSQLInjection($_REQUEST['offset']); 
$languageCode = BlockSQLInjection($_REQUEST['languageCode']);
// @$categoryId = BlockSQLInjection($_REQUEST['categoryId']); 
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

 
if($tagId == '')
{
	$code = array('responseCode' => '0','message' => 'String not Found'); 
	echo json_encode($code);
}
else
{   	

    $sqlChittiList = mysqli_query($dbconnect, "SELECT DISTINCT cm.chittiId  from chittitagmapping cm inner join chittigeographymapping cg on cm.chittiId = cg.chittiId inner join chitti c on c.chittiId = cg.chittiId WHERE (cg.geographyId = '$geographyId' and cg.areaId ='$areaId') and cm.tagId IN ($tagId) and c.finalStatus='approved'");
	$y = 0;
		$chittiIdList = array();
		
		 $countt1=mysqli_num_rows($sqlChittiList);	
		if($countt1 > 0)
		{
			while($displayChittiList = mysqli_fetch_array($sqlChittiList))
			{
				$chittiIdList[$y] = $displayChittiList['chittiId'];
				$y++;
			}
			 @$chittiList= join(',',$chittiIdList);
		}
// 		if($offset < 1)
// 		{
// 			 $sql ="select  ch.Title,ch.chittiId,ch.SubTitle,vg.geography,ch.description,ch.languageId,ch.dateOfApprove,IFNULL(cl.likes,0) as totalLike,IFNULL(chc.comment,0) as totalComment,IFNULL(cl2.isLiked,'false') as isLiked,cli.colorcode from `chitti` ch inner join vChittiGeography as vcg on ch.chittiId = vcg.chittiId inner join vGeography as vg on vcg.Geography = vg.geographycode left join colorinfo as cli on cli.id=ch.color_value left join (select chittiId,count(id) as likes from `chittilike` where `isLiked`='true' GROUP BY chittiId) cl on ch.chittiId = cl.chittiId left join (select chittiId, count(id) as comment from `chitticomment` GROUP BY chittiId) chc on ch.chittiId = chc.chittiId left join (select chittiId, isLiked from `chittilike` where `subscriberId`='$subscriberId') cl2 on ch.chittiId = cl2.chittiId where ch.chittiId IN ($chittiList) and vcg.Geography='$geographyCode' and ch.finalStatus='approved' GROUP BY ch.chittiId,ch.languageId,ch.dateOfApprove ORDER BY STR_TO_DATE( dateOfApprove,  '%d-%m-%Y' ) DESC";
// 		}
// 		else
// 		{ 
			 $sql ="select ch.Title,ch.chittiId,ch.SubTitle,vg.geography,ch.description,ch.languageId,ch.dateOfApprove,IFNULL(cl.likes,0) as totalLike,IFNULL(chc.comment,0) as totalComment,IFNULL(cl2.isLiked,'false') as isLiked,cli.colorcode from `chitti` ch inner join vChittiGeography as vcg on ch.chittiId = vcg.chittiId inner join vGeography as vg on vcg.Geography = vg.geographycode left join colorinfo as cli on cli.id=ch.color_value left join (select chittiId,count(id) as likes from `chittilike` where `isLiked`='true' GROUP BY chittiId) cl on ch.chittiId = cl.chittiId left join (select chittiId, count(id) as comment from `chitticomment` GROUP BY chittiId) chc on ch.chittiId = chc.chittiId left join (select chittiId, isLiked from `chittilike` where `subscriberId`='$subscriberId') cl2 on ch.chittiId = cl2.chittiId where ch.chittiId IN ($chittiList)  and vcg.Geography='$geographyCode' and ch.finalStatus='approved' GROUP BY ch.chittiId,ch.languageId,ch.dateOfApprove ORDER BY STR_TO_DATE( dateOfApprove,  '%d-%m-%Y' ) DESC";
// 		}
		
		// excecute SQL statement
		$result = mysqli_query($dbconnect, $sql);
		$result1 = mysqli_query($dbconnect, $sql);	   
		if(mysqli_num_rows($result1) > 0)
		{			
			$json = array("responseCode" => "1",
						"message" => "Success",
						"subscriberId" => $subscriberId,
						"Payload" => array());
			for ($i=0;$i<mysqli_num_rows($result);$i++)
			{		
				$obj=mysqli_fetch_array($result); 
				$chitti = array();
                $chitti["Title"] = $obj["Title"];
				$chittiId1 = $obj["chittiId"];
				$languageId = $obj["languageId"];
				$sqlChittiGeography = mysqli_fetch_array(mysqli_query($dbconnect, "select * from chittigeographymapping  WHERE chittiId='$chittiId1'")); 
				$areaId = $sqlChittiGeography['areaId'];
				$geographyId = $sqlChittiGeography['geographyId'];
				if($geographyId == '1')
				{ 
					$sqlQueryArea= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from mcountry where countryId ='$areaId'"));
					if($languageId =='1')
					{
						$area =  $sqlQueryArea['countryNameInEnglish'];
					}
					else if($languageId =='2')	
					{
						$area =  $sqlQueryArea['countryNameInUnicode'];
					}
					$postType = $sqlQueryArea['countryCode'];
				}
				else if($geographyId == '2')
				{
					$sqlQueryArea= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from mcity where cityId ='$areaId'")); 
					if($languageId =='1')
					{
						$area = $sqlQueryArea['citynameInEnglish'];
					}
					else if($languageId =='2')	
					{
						$area = $sqlQueryArea['citynameInUnicode'];
					}
					$postType = $sqlQueryArea['cityCode'];
				}
				else if($geographyId == '3')
				{
					$sqlQueryArea= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from mregion where regionId ='$areaId'"));
					if($languageId =='1')
					{
						$area = $sqlQueryArea['regionnameInEnglish'];
					}
					else if($languageId =='2')	
					{
						$area = $sqlQueryArea['regionnameInUnicode'];
					}
					$postType = $sqlQueryArea['regionCode'];
				}
					 
				$chitti["chittiId"] = $obj["chittiId"];
				$chitti["postType"] =  $postType;
				$chitti["chittiname"] = $area;
				$chitti["colorcode"] = $obj["colorcode"];
				$colorcode= $obj["colorcode"];
				$chitti["description"] = $obj["description"];
				$chitti["dateOfApprove"] = $obj["dateOfApprove"];
				$description =   $obj["description"];
				$font_color='';
				if(strpos($description,'<div style="') !== false){
                    // if($colorcode=='#4d4d4d'){
                        $font_color='';
                    // }
                    $description = str_replace('<div style="','<div style="background-color:'.$colorcode.'! important;'.$font_color.';',$description);
                } 
                $chitti["description"]=$description;
				// $chitti["description"] =   $obj["description"];
				$chitti["geography"]=   $obj["geography"];
				$explod_geo = explode("-",$chitti["geography"]);
				$geography = $explod_geo[0];
				//$chitti["url"] = "http://prarang.in/chittiDescription.php?chittiId=".$chitti["chittiId"];
				$datesplit= explode("-",substr($chitti["dateOfApprove"],0,10));
				$chitti["url"] = "http://prarang.in/".str_replace(" ","_",$geography).'/'.substr($datesplit[2],2,2).$datesplit[1].$datesplit[0].$chitti["chittiId"];
				//$chitti["url"] = "http://prarang.in/".str_replace(" ","_",$chitti["geography"]).'/'.substr($datesplit[2],2,2).$datesplit[1].$datesplit[0].$chitti["chittiId"];//chittiDescription.php?chittiId=".$chitti["chittiId"];
				$chitti["isLiked"] = $obj["isLiked"];
				$chitti["totalLike"] = $obj["totalLike"];
				$chitti["totalComment"] = $obj["totalComment"];
				//print_r($chitti);
				//getting chitti id to get image and tags
				$obj2=mysqli_fetch_object($result1);
				$chittiId = $obj2->chittiId;
				
				//getting images 
				 
				$sql3 ="select imageId,chittiId,imageUrl,isDefult from chittiimagemapping where chittiId = $chittiId";
				 
				$resultImages1 = mysqli_query($dbconnect, $sql3);
				for($j=0; $j < mysqli_num_rows($resultImages1); $j++ )
				{
					$chitti['image'][$j]=mysqli_fetch_object($resultImages1);
				}
				// print_r($chitti['image']);
				
				// getting tags
				 
				if($languageCode =='en')
				{
				$sql4 = "select chittitagmapping.chittiId,mtag.tagId,mtag.tagInEnglish as tagUnicode,mtag.tagIcon from chittitagmapping inner join mtag on chittitagmapping.tagId  = mtag.tagId  WHERE chittitagmapping.chittiId = $chittiId ORDER BY  chittitagmapping.chittiId DESC";
				}	
				else if($languageCode =='hi')	
				{
				$sql4 = "select chittitagmapping.chittiId,mtag.tagId,mtag.tagInUnicode as tagUnicode,mtag.tagIcon from chittitagmapping inner join mtag on chittitagmapping.tagId  = mtag.tagId  WHERE chittitagmapping.chittiId = $chittiId ORDER BY  chittitagmapping.chittiId DESC";
				}
				 	
				$resultTag1 = mysqli_query($dbconnect, $sql4);
				for($k=0; $k < mysqli_num_rows($resultTag1); $k++ )
				{
					$chitti['tags'][$k]=mysqli_fetch_object($resultTag1);
				}					
				// print_r($chitti['tags']);
			    array_push($json["Payload"], $chitti);
				//print_r($json);
				
			}
			
			//print_r($json);
		    echo json_encode($json,JSON_UNESCAPED_UNICODE);
		}
		else
		{
			if($languageCode =='en')
			{
				$code = array('responseCode' => '0','message' => 'Sorry no letters here, pick another geography!'); 
			}
			else if($languageCode =='hi')	
			{
				$code = array('responseCode' => '0','message' => 'माफ़ करे पत्र उपलब्ध नही है, दूसरा भुगोल चुने।'); 
			} 
			echo json_encode($code);  
		}
		
		// die if SQL statement failed
		if(!$result1){
		  http_response_code(404);
		  die(mysqli_error($dbconnect));
		}
		 
		// close mysqli connection
		mysqli_close($dbconnect);
	 
}	
?>