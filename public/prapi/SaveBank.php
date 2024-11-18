<?php 
header('Content-type: application/json');
include "include/connect.php";
//$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti');
//$link = mysqli_connect('localhost', 'prarang_1125', '#prarang1125#', 'prarang_riverSanskiriti'); 
$IP = $_SERVER['REMOTE_ADDR'];
@$subscriberId = BlockSQLInjection($_REQUEST['subscriberId']);
@$chittiId = BlockSQLInjection($_REQUEST['chittiId']);
@$geographyCode = BlockSQLInjection($_REQUEST['geographyCode']); 
@$isSave = BlockSQLInjection($_REQUEST['isSave']); 
@$UserCity = $_REQUEST['userCity'];
@$SaveDate = date("d-m-Y");
@$CurrentDate = date('Y-m-d H:i:s');
if($subscriberId!= '' and $chittiId != '' and $isSave !='' and $geographyCode !='')
{
	$sqlCheck=mysqli_query($dbconnect, "select * from chittisavebank where GeographyCode='$geographyCode' and chittiId ='$chittiId' and subscriberId='$subscriberId'");
	if(mysqli_num_rows($sqlCheck) > 0)
	{
		$sqlInsert=mysqli_query($dbconnect, "update chittisavebank set UpdatedDate='$CurrentDate', isSave='$isSave',IP = '$IP' where GeographyCode='$geographyCode' and chittiId ='$chittiId' and subscriberId='$subscriberId'");
	}else{
		$sqlInsert=mysqli_query($dbconnect, "insert into chittisavebank set GeographyCode='$geographyCode' , chittiId ='$chittiId',subscriberId='$subscriberId',isSave='$isSave',SaveDate='$SaveDate',IP = '$IP'"); 
	}
	$sqlCheck=mysqli_query($dbconnect, "select * from misreport where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d') ");
	if(mysqli_num_rows($sqlCheck) > 0){
		$displaymisreport = mysqli_fetch_assoc($sqlCheck);
		$MeerutBank = $displaymisreport['MeerutBank'];
		$RampurBank = $displaymisreport['RampurBank'];
		$LucknowBank = $displaymisreport['LucknowBank'];
		$JaunpurBank = $displaymisreport['JaunpurBank'];
		$SavedBank = $displaymisreport['SavedBank'];
		if($isSave==0){
			$isSave=$isSave;
			if($MeerutBank==0){
				$MeerutBank = $MeerutBank;
			}else{
				$MeerutBank = $MeerutBank-1;
			}
			if($RampurBank==0){
				$RampurBank = $RampurBank;
			}else{
				$RampurBank = $RampurBank-1;
			}
			if($LucknowBank==0){
				$LucknowBank = $LucknowBank;
			}else{
				$LucknowBank = $LucknowBank-1;
			}
			if($JaunpurBank==0){
				$JaunpurBank = $JaunpurBank;
			}else{
				$JaunpurBank = $JaunpurBank-1;
			}
			if($SavedBank==0){
				$SavedBank = $SavedBank;
			}else{
				$SavedBank = $SavedBank-1;
			}
			
		}else{
			
			$isSave=$isSave;
			$MeerutBank = $MeerutBank+1;
			$RampurBank = $RampurBank+1;
			$LucknowBank = $LucknowBank+1;
			$JaunpurBank = $JaunpurBank+1;
			$SavedBank = $SavedBank+1;
		}
		
		if($geographyCode=='c2'){
			
			$sqlInsert=mysqli_query($dbconnect, "Update misreport set SavedBank='$SavedBank',MeerutBank='$MeerutBank',Meerut='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
		
		}else if($geographyCode=='c3'){
			
			$sqlInsert=mysqli_query($dbconnect, "Update misreport set SavedBank='$SavedBank',RampurBank='$RampurBank', Rampur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
			
		}else if($geographyCode=='c4'){
			
			$sqlInsert=mysqli_query($dbconnect, "Update misreport set SavedBank='$SavedBank',LucknowBank='$LucknowBank', Lucknow='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
			
		}else if($geographyCode=='r4'){
			
			$sqlInsert=mysqli_query($dbconnect, "Update misreport set SavedBank='$SavedBank',JaunpurBank='$JaunpurBank',Jaunpur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
			
		}
		
		
	}else{
		$msubscriber=mysqli_query($dbconnect, "select name,mobileNo from msubscriberlist where subscriberId='$subscriberId' ");
		$displaySubscriber = mysqli_fetch_assoc($msubscriber);
		$UserName = $displaySubscriber['name'];
		$MobileNumber = $displaySubscriber['mobileNo'];
		if($isSave==0){
			$isSave=$isSave;
			$sqlCheck=mysqli_query($dbconnect, "select * from chittisavebank where GeographyCode='$geographyCode' and chittiId ='$chittiId' and subscriberId='$subscriberId'");
			$displaychittisavebank = mysqli_fetch_assoc($sqlCheck);
			$CreatedDate = $displaychittisavebank['CreatedDate'];
			$sqlCheck=mysqli_query($dbconnect, "select * from misreport where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CreatedDate', '%Y-%m-%d') ");	    
			$displaymisreport = mysqli_fetch_assoc($sqlCheck);
			$MeerutBank = $displaymisreport['MeerutBank'];
			$RampurBank = $displaymisreport['RampurBank'];
			$LucknowBank = $displaymisreport['LucknowBank'];
			$JaunpurBank = $displaymisreport['JaunpurBank'];
			$SavedBank = $displaymisreport['SavedBank'];
			$SavedBank = $SavedBank-1;
			if($geographyCode=='c2'){
				$MeerutBank = $MeerutBank-1;
				$sqlInsert=mysqli_query($dbconnect, "Update misreport set SavedBank='$SavedBank',MeerutBank='$MeerutBank',Meerut='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CreatedDate', '%Y-%m-%d')  ");
			
			}else if($geographyCode=='c3'){
				$RampurBank = $RampurBank-1;
				$sqlInsert=mysqli_query($dbconnect, "Update misreport set SavedBank='$SavedBank',RampurBank='$RampurBank', Rampur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CreatedDate', '%Y-%m-%d')  ");
				
			}else if($geographyCode=='c4'){
				$LucknowBank = $LucknowBank-1;
				$sqlInsert=mysqli_query($dbconnect, "Update misreport set SavedBank='$SavedBank',LucknowBank='$LucknowBank', Lucknow='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CreatedDate', '%Y-%m-%d')  ");
				
			}else if($geographyCode=='r4'){
				$JaunpurBank = $JaunpurBank-1;
				$sqlInsert=mysqli_query($dbconnect, "Update misreport set SavedBank='$SavedBank',JaunpurBank='$JaunpurBank',Jaunpur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CreatedDate', '%Y-%m-%d')  ");
				
			}
		}else{
			$isSave=$isSave;
		}
		if($geographyCode=='c2'){

			$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Meerut='$geographyCode',MeerutBank='$isSave',SavedBank='$isSave', SubscriberId='$subscriberId' , UserCity='$UserCity'  ");
		
		}else if($geographyCode=='c3'){

			$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Rampur='$geographyCode',RampurBank='$isSave', SavedBank='$isSave', SubscriberId='$subscriberId' , UserCity='$UserCity'  ");
			
		}else if($geographyCode=='c4'){

			$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Lucknow='$geographyCode',LucknowBank='$isSave',SavedBank='$isSave', SubscriberId='$subscriberId' , UserCity='$UserCity'  ");
			
		}else if($geographyCode=='r4'){

			$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Jaunpur='$geographyCode',JaunpurBank='$isSave',SavedBank='$isSave',  SubscriberId='$subscriberId' , UserCity='$UserCity'  ");
			
		}
	}
	 
	//excecute SQL statement
	$sql = "select chittiId,subscriberId,isSave,GeographyCode from chittisavebank WHERE GeographyCode='$geographyCode' and chittiId ='$chittiId' and subscriberId='$subscriberId'";  
	
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