<?php 
header('Content-type: application/json');
include "include/connect.php";
$IP = $_SERVER['REMOTE_ADDR'];
@$subscriberId = BlockSQLInjection($_REQUEST['subscriberId']);
@$chittiId = BlockSQLInjection($_REQUEST['chittiId']);
@$geographyCode = BlockSQLInjection($_REQUEST['geographyCode']); 
@$isLiked = BlockSQLInjection($_REQUEST['isLiked']); 
@$UserCity = $_REQUEST['userCity'];
@$likeDate = date("d-m-Y");
@$CurrentDate = date('Y-m-d H:i:s');
if($subscriberId!= '' and $chittiId != '' and $isLiked !='' and $geographyCode !='')
{
	$sqlCheck=mysqli_query($dbconnect, "select * from chittilike where GeographyCode='$geographyCode' and chittiId ='$chittiId' and subscriberId='$subscriberId'");
	if(mysqli_num_rows($sqlCheck) > 0)
	{
		$sqlInsert=mysqli_query($dbconnect, "update chittilike set UpdatedDate='$CurrentDate', isLiked='$isLiked',IP = '$IP' where GeographyCode='$geographyCode' and chittiId ='$chittiId' and subscriberId='$subscriberId'");
	}else{
		$sqlInsert=mysqli_query($dbconnect, "insert into chittilike set GeographyCode='$geographyCode' , chittiId ='$chittiId',subscriberId='$subscriberId',isLiked='$isLiked',likeDate='$likeDate',IP = '$IP'"); 
	}
	$sqlCheck=mysqli_query($dbconnect, "select * from misreport where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d') ");
	if(mysqli_num_rows($sqlCheck) > 0){
		$displaymisreport = mysqli_fetch_assoc($sqlCheck);
		$MeerutLikes = $displaymisreport['MeerutLikes'];
		$RampurLikes = $displaymisreport['RampurLikes'];
		$LucknowLikes = $displaymisreport['LucknowLikes'];
		$JaunpurLikes = $displaymisreport['JaunpurLikes'];
		$FeedsLikes = $displaymisreport['FeedsLikes'];
		if($isLiked=='false'){
			$isLiked=$isLiked;
			if($MeerutLikes=='false'){
				$MeerutLikes = $MeerutLikes;
			}else{
				$MeerutLikes = $MeerutLikes-1;
			}
			if($RampurLikes=='false'){
				$RampurLikes = $RampurLikes;
			}else{
				$RampurLikes = $RampurLikes-1;
			}
			if($LucknowLikes=='false'){
				$LucknowLikes = $LucknowLikes;
			}else{
				$LucknowLikes = $LucknowLikes-1;
			}
			if($JaunpurLikes=='false'){
				$JaunpurLikes = $JaunpurLikes;
			}else{
				$JaunpurLikes = $JaunpurLikes-1;
			}
			if($FeedsLikes=='false'){
				$FeedsLikes = $FeedsLikes;
			}else{
				$FeedsLikes = $FeedsLikes-1;
			}
			
		}else{
			
			$isLiked=$isLiked;
			$MeerutLikes = $MeerutLikes+1;
			$RampurLikes = $RampurLikes+1;
			$LucknowLikes = $LucknowLikes+1;
			$JaunpurLikes = $JaunpurLikes+1;
			$FeedsLikes = $FeedsLikes+1;
		}
		
		if($geographyCode=='c2'){
			
			$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsLikes='$FeedsLikes',MeerutLikes='$MeerutLikes',Meerut='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
		
		}else if($geographyCode=='c3'){
			
			$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsLikes='$FeedsLikes',RampurLikes='$RampurLikes', Rampur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
			
		}else if($geographyCode=='c4'){
			
			$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsLikes='$FeedsLikes',LucknowLikes='$LucknowLikes', Lucknow='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
			
		}else if($geographyCode=='r4'){
			
			$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsLikes='$FeedsLikes',JaunpurLikes='$JaunpurLikes',Jaunpur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
			
		}
		
		
	}else{
		$msubscriber=mysqli_query($dbconnect, "select name,mobileNo from msubscriberlist where subscriberId='$subscriberId' ");
		$displaySubscriber = mysqli_fetch_assoc($msubscriber);
		$UserName = $displaySubscriber['name'];
		$MobileNumber = $displaySubscriber['mobileNo'];
		if($isLiked=='false'){
			$isLiked=$isLiked;
			$sqlCheck=mysqli_query($dbconnect, "select * from chittilike where GeographyCode='$geographyCode' and chittiId ='$chittiId' and subscriberId='$subscriberId'");
			$displaychittilike = mysqli_fetch_assoc($sqlCheck);
			$CreatedDate = $displaychittilike['CreatedDate'];
			$sqlCheck=mysqli_query($dbconnect, "select * from misreport where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CreatedDate', '%Y-%m-%d') ");	    
			$displaymisreport = mysqli_fetch_assoc($sqlCheck);
			$MeerutLikes = $displaymisreport['MeerutLikes'];
			$RampurLikes = $displaymisreport['RampurLikes'];
			$LucknowLikes = $displaymisreport['LucknowLikes'];
			$JaunpurLikes = $displaymisreport['JaunpurLikes'];
			$FeedsLikes = $displaymisreport['FeedsLikes'];
			$FeedsLikes = $FeedsLikes-1;
			if($geographyCode=='c2'){
				$MeerutLikes = $MeerutLikes-1;
				$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsLikes='$FeedsLikes',MeerutLikes='$MeerutLikes',Meerut='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CreatedDate', '%Y-%m-%d')  ");
			
			}else if($geographyCode=='c3'){
				$RampurLikes = $RampurLikes-1;
				$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsLikes='$FeedsLikes',RampurLikes='$RampurLikes', Rampur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CreatedDate', '%Y-%m-%d')  ");
				
			}else if($geographyCode=='c4'){
				$LucknowLikes = $LucknowLikes-1;
				$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsLikes='$FeedsLikes',LucknowLikes='$LucknowLikes', Lucknow='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CreatedDate', '%Y-%m-%d')  ");
				
			}else if($geographyCode=='r4'){
				$JaunpurLikes = $JaunpurLikes-1;
				$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsLikes='$FeedsLikes',JaunpurLikes='$JaunpurLikes',Jaunpur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CreatedDate', '%Y-%m-%d')  ");
				
			}
		}else{
			$isLiked=$isLiked;
		}
		if($geographyCode=='c2'){

			$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Meerut='$geographyCode',MeerutLikes='$isLiked',FeedsLikes='$isLiked', SubscriberId='$subscriberId',UserCity='$UserCity'  ");
		
		}else if($geographyCode=='c3'){

			$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Rampur='$geographyCode',RampurLikes='$isLiked', FeedsLikes='$isLiked', SubscriberId='$subscriberId',UserCity='$UserCity'  ");
			
		}else if($geographyCode=='c4'){

			$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Lucknow='$geographyCode',LucknowLikes='$isLiked',FeedsLikes='$isLiked', SubscriberId='$subscriberId',UserCity='$UserCity'  ");
			
		}else if($geographyCode=='r4'){

			$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Jaunpur='$geographyCode',JaunpurLikes='$isLiked',FeedsLikes='$isLiked',  SubscriberId='$subscriberId',UserCity='$UserCity'  ");
			
		}
	}
	 
	//excecute SQL statement
	$sql = "select chittiId,subscriberId,isLiked,GeographyCode from chittilike WHERE GeographyCode='$geographyCode' and chittiId ='$chittiId' and subscriberId='$subscriberId'";  
	
	$result = mysqli_query($dbconnect,$sql);

	if(mysqli_num_rows($result) > 0)
	{
		$json['responseCode']="1";
		$json['message']="Success";
		$json['Payload']=mysqli_fetch_object($result);
		
		echo json_encode($json,JSON_UNESCAPED_UNICODE);
	}
	else
	{
		$code = array('responseCode' => '0','message' => 'Error'); 
		echo json_encode($code);  
	} 
	
			
	// die if SQL statement failed
	if (!$result) 
	{
	  http_response_code(404);
	  die(mysqli_error($dbconnect));
	}

}
else
{
	$code = array('responseCode' => '0','message' => 'Query string not found'); 
	echo json_encode($code);
}

// close mysqli connection
mysqli_close($dbconnect);
