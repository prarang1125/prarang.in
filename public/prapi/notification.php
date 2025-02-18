 <?php
 include "include/connect.php"; 
//$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti');
//$link = mysqli_connect('localhost', 'prarang_1125', '#prarang1125#', 'prarang_riverSanskiriti');
@$chittiLastStatusId = BlockSQLInjection($_REQUEST['chittiLastStatusId']); 
$sql1="select id,message,subscriberId,gcmKey,chittiId from notification where flag='pending'"; 
//excecute SQL statement
$result2 = mysqli_query($dbconnect, $sql1);
//echo mysqli_num_rows($result); 
for($i=0;$i< mysqli_num_rows($result2); $i++)
{
	 
	$obj=mysqli_fetch_array($result2); 
	$id = $obj['id'];
	$chittiId = $obj['chittiId'];
	$key = $obj['gcmKey'];
	$message = $obj['message'];
	$subscriberId = $obj['subscriberId']; 
	
	sendNotification($id,$key,$message,$chittiId,$subscriberId);
	$sql=mysqli_query($dbconnect, "update notification set flag ='sent' where flag='pending' and id='$id'"); 
	//echo $result;
}  
function sendNotification($x,$y,$z,$a,$b) 
{
		include "include/connect.php"; 
//$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti');	
		$notificationId = $x;
		echo $gcmkey= $y;
		$messageToSend = $z;
		$chittiId = $a; 
		$subscriberId = $b;
		
		$sql ="select ch.chittiId,ch.description,ch.languageId,ch.dateOfApprove,IFNULL(cl.likes,0) as totalLike,IFNULL(chc.comment,0) as totalComment,IFNULL(cl2.isLiked,'false') as isLiked from `chitti` ch left join (select chittiId,count(id) as likes from `chittilike` where `isLiked`='true' GROUP BY chittiId) cl on ch.chittiId = cl.chittiId left join (select chittiId, count(id) as comment from `chitticomment` GROUP BY chittiId) chc on ch.chittiId = chc.chittiId left join (select chittiId, isLiked from `chittilike` where `subscriberId`='$subscriberId') cl2 on ch.chittiId = cl2.chittiId where ch.chittiId = $chittiId GROUP BY ch.chittiId,ch.description,ch.languageId,ch.dateOfApprove";
	
		$result = mysqli_query($dbconnect, $sql);
		$result1 = mysqli_query($dbconnect, $sql);
			
		if(mysqli_num_rows($result1) > 0)
		{			
			
			for ($i=0;$i<mysqli_num_rows($result);$i++)
			{		
				$obj=mysqli_fetch_array($result); 
				$chitti = array();
				$chittiId1 = $obj["chittiId"];
				$languageId1 = $obj["languageId"];
				$sqlChittiGeography = mysqli_fetch_array(mysqli_query($dbconnect, "select * from chittigeographymapping  WHERE chittiId='$chittiId1'")); 
				$areaId = $sqlChittiGeography['areaId'];
				
				$sqlQueryArea= mysqli_fetch_assoc(mysqli_query($dbconnect, "select * from mcity where cityId ='$areaId'")); 
				if($languageId1 =='1')
				{
					$area = $sqlQueryArea['citynameInEnglish'];
				}
				else if($languageId1 =='2')	
				{
					$area = $sqlQueryArea['citynameInUnicode'];
				}
					
				
				$chitti["chittiId"] = $obj["chittiId"];
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
				$sqlChittidefaultImage = mysqli_fetch_array(mysqli_query($dbconnect, "select imageUrl from chittiimagemapping where chittiId = $chittiId and isDefult='true'")); 
				$defaultImage = $sqlChittidefaultImage['imageUrl'];
				 
				//getting tags 
				if($languageId1 =='1')
				{
				$sql4 = "select chittitagmapping.chittiId,mtag.tagId,mtag.tagInEnglish as tagUnicode,mtag.tagIcon from chittitagmapping inner join mtag on chittitagmapping.tagId  = mtag.tagId  WHERE chittitagmapping.chittiId = $chittiId ORDER BY  chittitagmapping.chittiId DESC";
				}	
				else if($languageId1 =='2')	
				{
				$sql4 = "select chittitagmapping.chittiId,mtag.tagId,mtag.tagInUnicode as tagUnicode,mtag.tagIcon from chittitagmapping inner join mtag on chittitagmapping.tagId  = mtag.tagId  WHERE chittitagmapping.chittiId = $chittiId ORDER BY  chittitagmapping.chittiId DESC";
				}
					
				$resultTag1 = mysqli_query($dbconnect, $sql4);
				for($k=0; $k < mysqli_num_rows($resultTag1); $k++ )
				{
					$chitti['tags'][$k]=mysqli_fetch_object($resultTag1);
				}					
				 
				//array_push($json["payload"], $chitti);
			}
			
			$json = array("title" => "Prarang",
				"message" => $messageToSend,
				"image" => $defaultImage,
				"payload" => $chitti);
			//print_r($json);
			 echo  $data1 = json_encode($json,JSON_UNESCAPED_UNICODE);
		}
		
		
        $url = 'https://fcm.googleapis.com/fcm/send';
        $priority = "high";
         
		
         $data = json_encode(array(
            "title" => "Prarang",
            "message" => $messageToSend, 
			"image" => "http://www.sirrat.com/riverSanskiriti/avatar.png",
			"payload" => $json,
        ));
        $finalData = array(
            'data' => $data1
        );
        $fields = array(
            "registration_ids" => array(
                $gcmkey
            ),
            "data" => $finalData
        );
		// print_r($fields);


        $headers = array(
            'Authorization:key=AIzaSyD7lwy8Q3vdL8yzBBEwKnFwzRhcRqoEAUQ',
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

       $result = curl_exec($ch);
        curl_error($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
         
        return $result;
		
}

?>	