<?php 
header('Content-type: application/json ');

include "include/connect.php";

$IP = $_SERVER['REMOTE_ADDR'] ?? '00.00.00.00';

$ShareDate = date("d-m-Y");
$CurrentDate = date('Y-m-d H:i:s');

@$subscriberId = BlockSQLInjection($_REQUEST['subscriberId']); 
@$chittiId = BlockSQLInjection($_REQUEST['chittiId']);
@$Share =   BlockSQLInjection(utf8_encode($_REQUEST['Share']));
@$geographyCode = BlockSQLInjection($_REQUEST['geographyCode']); 

@$UserCity = $_REQUEST['userCity'];

$response = [
    'IP' => $IP,
    'ShareDate' => $ShareDate,
    'subscriberId' => $subscriberId,
    'chittiId' => $chittiId,
    'Share' => $Share,
    'geographyCode' => $geographyCode,
    'UserCity' => $UserCity,
    'CurrentDate' => $CurrentDate,
];

// Return the JSON response
// echo json_encode($response);
//  die();

$sqlSubName= mysqli_query($dbconnect, "select * from msubscriberlist where subscriberId = '$subscriberId' ");

if(mysqli_num_rows($sqlSubName) > 0)
{
	$subscribername = mysqli_fetch_assoc($sqlSubName);
	
	$name = $subscribername['name'];
	if($chittiId != '' and $geographyCode !='')
	{

			$sqlInsert= mysqli_query($dbconnect, "insert into chittishare set subscriberId='$subscriberId',chittiId='$chittiId',Share='$Share',name='$name' ,ShareDate='$ShareDate',IP = '$IP',GeographyCode='$geographyCode'");
			$id = mysqli_insert_id($dbconnect);
			$sql = "select subscriberId,name,chittiId,Share,GeographyCode from chittishare WHERE id ='$id'";
			$sqlCheck=mysqli_query($dbconnect, "select * from misreport where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d') ");
			if(mysqli_num_rows($sqlCheck) > 0){
				$displaymisreport = mysqli_fetch_assoc($sqlCheck);
				$MeerutShare = $displaymisreport['MeerutShare'];
				$RampurShare = $displaymisreport['RampurShare'];
				$LucknowShare = $displaymisreport['LucknowShare'];
				$JaunpurShare = $displaymisreport['JaunpurShare'];
				$FeedShares = $displaymisreport['FeedShares'];
				
				$MeerutShare = $MeerutShare+1;
				$RampurShare = $RampurShare+1;
				$LucknowShare = $LucknowShare+1;
				$JaunpurShare = $JaunpurShare+1;
				$FeedShares = $FeedShares+1;
				
				
				if($geographyCode=='c2'){
					
					$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedShares='$FeedShares',MeerutShare='$MeerutShare',Meerut='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
				
				}else if($geographyCode=='c3'){
					
					$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedShares='$FeedShares',RampurShare='$RampurShare', Rampur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
					
				}else if($geographyCode=='c4'){
					
					$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedShares='$FeedShares',LucknowShare='$LucknowShare', Lucknow='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
					
				}else if($geographyCode=='r4'){
					
					$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedShares='$FeedShares',JaunpurShare='$JaunpurShare',Jaunpur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
					
				}
				
				
			}else{
				$msubscriber=mysqli_query($dbconnect, "select name,mobileNo from msubscriberlist where subscriberId='$subscriberId' ");
				$displaySubscriber = mysqli_fetch_assoc($msubscriber);
				$UserName = $displaySubscriber['name'];
				$MobileNumber = $displaySubscriber['mobileNo'];
				
				if($geographyCode=='c2'){

					$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Meerut='$geographyCode',MeerutShare='1',FeedShares='1', SubscriberId='$subscriberId', UserCity='$UserCity'  ");
				
				}else if($geographyCode=='c3'){

					$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Rampur='$geographyCode',RampurShare='1', FeedShares='1', SubscriberId='$subscriberId', UserCity='$UserCity'  ");
					
				}else if($geographyCode=='c4'){

					$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Lucknow='$geographyCode',LucknowShare='1',FeedShares='1', SubscriberId='$subscriberId' , UserCity='$UserCity' ");
					
				}else if($geographyCode=='r4'){

					$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Jaunpur='$geographyCode',JaunpurShare='1',FeedShares='1',  SubscriberId='$subscriberId' , UserCity='$UserCity' ");
					
				}
			
		}			
		
				 
			
		
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
			$code = array('responseCode' => '0','message' => 'Record Not Found!'); 
			echo json_encode($code);  
		} 		
		
		if (!$result) 
		{
		  http_response_code(404);
		  die(mysqli_error($dbconnect));
		}
	}
	else
	{
		$code = array('responseCode' => '0','message' => 'Post Not Found!'); 
		echo json_encode($code);     
	}

	
	mysqli_close($dbconnect);
}
else
{
	$code = array('responseCode' => '0','message' => 'Subscriber not found!'); 
	echo json_encode($code);  
}