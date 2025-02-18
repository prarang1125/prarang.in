<?php 
header('Content-type: application/json ');

//$IP = $_SERVER['REMOTE_ADDR']
//header('Access-Control-Allow-Origin :', $_Server['HTTP_ORIGIN'] . "");

include "include/connect.php";
//$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti'); 
//$link = mysqli_connect('localhost', 'prarang_1125', '#prarang1125#', 'prarang_riverSanskiriti');
@$IP = $_SERVER['REMOTE_ADDR']; 
@$commentDate = date("d-m-Y");
@$subscriberId = BlockSQLInjection($_REQUEST['subscriberId']); 
@$chittiId = BlockSQLInjection($_REQUEST['chittiId']);
@$comment =   BlockSQLInjection(utf8_encode($_REQUEST['comment']));
@$geographyCode = BlockSQLInjection($_REQUEST['geographyCode']);  
//$comment =   $_REQUEST['comment']; 
@$UserCity = $_REQUEST['userCity'];
@$CurrentDate = date('Y-m-d H:i:s');
//$date = date("d-m-Y H:i:s"); 
@$string = $_FILES['commentImage']['name'];
@$exp=explode(".",$string);
@$fileName = $exp[0];
@$ext = $exp[1];



 
$sqlSubName= mysqli_query($dbconnect, "select * from msubscriberlist where subscriberId = '$subscriberId'");

if(mysqli_num_rows($sqlSubName) > 0)
{
	$subscribername = mysqli_fetch_assoc($sqlSubName);
	
	$name = $subscribername['name'];
	if($chittiId != '' and $geographyCode !='')
	{
		@$uploaddir = 'commentImages/';
		@$uploadfile = $uploaddir .  $fileName."_".time().".".$ext;
		@$url = "http://apps.prarang.in/".$uploadfile; 
		// move_uploaded_file($_FILES['commentImage']['tmp_name'], $uploadfile);
		@$fileName = $_FILES["commentImage"]["name"];
		if($fileName != '')
		{
			$sqlInsert= mysqli_query($dbconnect, "insert into chitticomment set subscriberId='$subscriberId',chittiId='$chittiId',Comment='$comment',name='$name',imageUrl='$url',commentDate='$commentDate',IP = '$IP',GeographyCode='$geographyCode', UserCity='$UserCity'");
			$id = mysqli_insert_id();
			mysqli_query($dbconnect, 'SET collation_connection=utf8_general_ci');
			$sql = "select subscriberId,name,chittiId,Comment,imageUrl,GeographyCode from chitticomment WHERE id ='$id'";
			$sqlCheck=mysqli_query($dbconnect, "select * from misreport where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d') ");
			if(mysqli_num_rows($sqlCheck) > 0){
				$displaymisreport = mysqli_fetch_assoc($sqlCheck);
				$MeerutCommnet = $displaymisreport['MeerutCommnet'];
				$RampurCommnet = $displaymisreport['RampurCommnet'];
				$LucknowCommnet = $displaymisreport['LucknowCommnet'];
				$JaunpurCommnet = $displaymisreport['JaunpurCommnet'];
				$FeedsComments = $displaymisreport['FeedsComments'];
				
				$MeerutCommnet = $MeerutCommnet+1;
				$RampurCommnet = $RampurCommnet+1;
				$LucknowCommnet = $LucknowCommnet+1;
				$JaunpurCommnet = $JaunpurCommnet+1;
				$FeedsComments = $FeedsComments+1;
				
				
				if($geographyCode=='c2'){
					
					$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsComments='$FeedsComments',MeerutCommnet='$MeerutCommnet',Meerut='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
				
				}else if($geographyCode=='c3'){
					
					$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsComments='$FeedsComments',RampurCommnet='$RampurCommnet', Rampur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
					
				}else if($geographyCode=='c4'){
					
					$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsComments='$FeedsComments',LucknowCommnet='$LucknowCommnet', Lucknow='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
					
				}else if($geographyCode=='r4'){
					
					$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsComments='$FeedsComments',JaunpurCommnet='$JaunpurCommnet',Jaunpur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
					
				}
				
				
			}else{
				$msubscriber=mysqli_query($dbconnect, "select name,mobileNo from msubscriberlist where subscriberId='$subscriberId' ");
				$displaySubscriber = mysqli_fetch_assoc($msubscriber);
				$UserName = $displaySubscriber['name'];
				$MobileNumber = $displaySubscriber['mobileNo'];
				
				if($geographyCode=='c2'){

					$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Meerut='$geographyCode',MeerutCommnet='1',FeedsComments='1', SubscriberId='$subscriberId' , UserCity='$UserCity' ");
				
				}else if($geographyCode=='c3'){

					$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Rampur='$geographyCode',RampurCommnet='1', FeedsComments='1', SubscriberId='$subscriberId' , UserCity='$UserCity' ");
					
				}else if($geographyCode=='c4'){

					$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Lucknow='$geographyCode',LucknowCommnet='1',FeedsComments='1', SubscriberId='$subscriberId' , UserCity='$UserCity' ");
					
				}else if($geographyCode=='r4'){

					$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Jaunpur='$geographyCode',JaunpurCommnet='1',FeedsComments='1',  SubscriberId='$subscriberId' , UserCity='$UserCity' ");
					
				}
			}
		}
        else
		{

			$sqlInsert= mysqli_query($dbconnect, "insert into chitticomment set subscriberId='$subscriberId',chittiId='$chittiId',Comment='$comment',name='$name' ,commentDate='$commentDate',IP = '$IP',GeographyCode='$geographyCode', UserCity='$UserCity'");
			$id = mysqli_insert_id($dbconnect);
			$sql = "select subscriberId,name,chittiId,Comment,GeographyCode from chitticomment WHERE id ='$id'";
			$sqlCheck=mysqli_query($dbconnect, "select * from misreport where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d') ");
			if(mysqli_num_rows($sqlCheck) > 0){
				$displaymisreport = mysqli_fetch_assoc($sqlCheck);
				$MeerutCommnet = $displaymisreport['MeerutCommnet'];
				$RampurCommnet = $displaymisreport['RampurCommnet'];
				$LucknowCommnet = $displaymisreport['LucknowCommnet'];
				$JaunpurCommnet = $displaymisreport['JaunpurCommnet'];
				$FeedsComments = $displaymisreport['FeedsComments'];
				
				$MeerutCommnet = $MeerutCommnet+1;
				$RampurCommnet = $RampurCommnet+1;
				$LucknowCommnet = $LucknowCommnet+1;
				$JaunpurCommnet = $JaunpurCommnet+1;
				$FeedsComments = $FeedsComments+1;
				
				
				if($geographyCode=='c2'){
					
					$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsComments='$FeedsComments',MeerutCommnet='$MeerutCommnet',Meerut='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
				
				}else if($geographyCode=='c3'){
					
					$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsComments='$FeedsComments',RampurCommnet='$RampurCommnet', Rampur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
					
				}else if($geographyCode=='c4'){
					
					$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsComments='$FeedsComments',LucknowCommnet='$LucknowCommnet', Lucknow='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
					
				}else if($geographyCode=='r4'){
					
					$sqlInsert=mysqli_query($dbconnect, "Update misreport set FeedsComments='$FeedsComments',JaunpurCommnet='$JaunpurCommnet',Jaunpur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
					
				}
				
				
			}else{
				$msubscriber=mysqli_query($dbconnect, "select name,mobileNo from msubscriberlist where subscriberId='$subscriberId' ");
				$displaySubscriber = mysqli_fetch_assoc($msubscriber);
				$UserName = $displaySubscriber['name'];
				$MobileNumber = $displaySubscriber['mobileNo'];
				
				if($geographyCode=='c2'){

					$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Meerut='$geographyCode',MeerutCommnet='1',FeedsComments='1', SubscriberId='$subscriberId' , UserCity='$UserCity' ");
				
				}else if($geographyCode=='c3'){

					$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Rampur='$geographyCode',RampurCommnet='1', FeedsComments='1', SubscriberId='$subscriberId' , UserCity='$UserCity' ");
					
				}else if($geographyCode=='c4'){

					$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Lucknow='$geographyCode',LucknowCommnet='1',FeedsComments='1', SubscriberId='$subscriberId' , UserCity='$UserCity' ");
					
				}else if($geographyCode=='r4'){

					$sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Jaunpur='$geographyCode',JaunpurCommnet='1',FeedsComments='1',  SubscriberId='$subscriberId' , UserCity='$UserCity' ");
					
				}
			}
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
			$code = array('responseCode' => '0','message' => 'Record Not Found!'); 
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
		$code = array('responseCode' => '0','message' => 'Post Not Found!'); 
		echo json_encode($code);     
	}

	// close mysqli connection
	mysqli_close($dbconnect);
}
else
{
	$code = array('responseCode' => '0','message' => 'Subscriber not found!'); 
	echo json_encode($code);  
}