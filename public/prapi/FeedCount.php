<?php 
header('Content-type: application/json ');

include "include/connect.php";
@$IP = $_SERVER['REMOTE_ADDR']; 
@$FeedDate = date("d-m-Y");
@$subscriberId = BlockSQLInjection($_REQUEST['subscriberId']); 
@$chittiId = BlockSQLInjection($_REQUEST['chittiId']);
@$isFeed =   BlockSQLInjection(utf8_encode($_REQUEST['isFeed']));
@$geographyCode = BlockSQLInjection($_REQUEST['geographyCode']);
@$UserCity = $_REQUEST['userCity'];
@$CurrentDate = date('Y-m-d H:i:s');
 
$sqlSubName= mysqli_query($dbconnect, "select * from msubscriberlist where subscriberId = '$subscriberId'");

if(mysqli_num_rows($sqlSubName) > 0)
{
	$subscribername = mysqli_fetch_assoc($sqlSubName);
	
	$name = $subscribername['name'];
	if($chittiId != '' and $geographyCode !='')
	{

		
        $sqlInsert= mysqli_query($dbconnect, "insert into colorfeeds set subscriberId='$subscriberId',chittiId='$chittiId',isFeed='$isFeed',name='$name' ,FeedDate='$FeedDate',IP = '$IP',GeographyCode='$geographyCode'");
        $id = mysqli_insert_id($dbconnect);
        $sql = "select subscriberId,name,chittiId,isFeed,GeographyCode from colorfeeds WHERE id ='$id'";
        $sqlCheck=mysqli_query($dbconnect, "select * from misreport where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d') ");
        if(mysqli_num_rows($sqlCheck) > 0){
            $displaymisreport = mysqli_fetch_assoc($sqlCheck);
            $MeerutColorFeeds = $displaymisreport['MeerutColorFeeds'];
            $RampurColorFeeds = $displaymisreport['RampurColorFeeds'];
            $LucknowColorFeeds = $displaymisreport['LucknowColorFeeds'];
            $JaunpurColorFeeds = $displaymisreport['JaunpurColorFeeds'];
            $TotalColorFeeds = $displaymisreport['TotalColorFeeds'];
            
            $MeerutColorFeeds = $MeerutColorFeeds+1;
            $RampurColorFeeds = $RampurColorFeeds+1;
            $LucknowColorFeeds = $LucknowColorFeeds+1;
            $JaunpurColorFeeds = $JaunpurColorFeeds+1;
            $TotalColorFeeds = $TotalColorFeeds+1;
            
            
            if($geographyCode=='c2'){
                
                $sqlInsert=mysqli_query($dbconnect, "Update misreport set TotalColorFeeds='$TotalColorFeeds',MeerutColorFeeds='$MeerutColorFeeds',Meerut='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
            
            }else if($geographyCode=='c3'){
                
                $sqlInsert=mysqli_query($dbconnect, "Update misreport set TotalColorFeeds='$TotalColorFeeds',RampurColorFeeds='$RampurColorFeeds', Rampur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
                
            }else if($geographyCode=='c4'){
                
                $sqlInsert=mysqli_query($dbconnect, "Update misreport set TotalColorFeeds='$TotalColorFeeds',LucknowColorFeeds='$LucknowColorFeeds', Lucknow='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
                
            }else if($geographyCode=='r4'){
                
                $sqlInsert=mysqli_query($dbconnect, "Update misreport set TotalColorFeeds='$TotalColorFeeds',JaunpurColorFeeds='$JaunpurColorFeeds',Jaunpur='$geographyCode', UpdatedDate='$CurrentDate' where SubscriberId='$subscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
                
            }
            
            
        }else{
            $msubscriber=mysqli_query($dbconnect, "select name,mobileNo from msubscriberlist where subscriberId='$subscriberId' ");
            $displaySubscriber = mysqli_fetch_assoc($msubscriber);
            $UserName = $displaySubscriber['name'];
            $MobileNumber = $displaySubscriber['mobileNo'];
            
            if($geographyCode=='c2'){

                $sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Meerut='$geographyCode',MeerutColorFeeds='1',TotalColorFeeds='1', SubscriberId='$subscriberId' , UserCity='$UserCity' ");
            
            }else if($geographyCode=='c3'){

                $sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Rampur='$geographyCode',RampurColorFeeds='1', TotalColorFeeds='1', SubscriberId='$subscriberId' , UserCity='$UserCity' ");
                
            }else if($geographyCode=='c4'){

                $sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Lucknow='$geographyCode',LucknowColorFeeds='1',TotalColorFeeds='1', SubscriberId='$subscriberId' , UserCity='$UserCity' ");
                
            }else if($geographyCode=='r4'){

                $sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', Jaunpur='$geographyCode',JaunpurColorFeeds='1',TotalColorFeeds='1',  SubscriberId='$subscriberId' , UserCity='$UserCity' ");
                
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

	mysqli_close($dbconnect);
}
else
{
	$code = array('responseCode' => '0','message' => 'Subscriber not found!'); 
	echo json_encode($code);  
}
