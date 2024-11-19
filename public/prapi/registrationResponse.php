<?php 
header('Content-type: application/json');
include "include/connect.php";

$IP = $_SERVER['REMOTE_ADDR']; 
date_default_timezone_set('Asia/Kolkata');
$Date = date("d-m-y");
$Time = date("h:i:sa");

mysqli_set_charset($dbconnect, 'utf8');
$string = '123456789';
$string_shuffled = str_shuffle($string);
$otp = substr($string_shuffled, 1, 6);


$name = $_REQUEST['name']; 
$mobileNo = $_REQUEST['mobile'];
@$mobileNo = str_replace('%2B','+',$mobileNo);
@$userLocation = $_REQUEST['userLocation'];  
@$u=explode(",",$userLocation);
@$countryId = $u[1];
@$cityId = $u[0];
@$geographyid = $_REQUEST['geographyid']; 

@$otpToBeSend = $_REQUEST['otpToBeSend']; 
$gcmKey = $_REQUEST['gcmKey']; 

$profilePic ="https://new.png";

$payloaddata = array(); 
if($name!= '' and $mobileNo != '')
{		
	$sqlCheck=mysqli_query($dbconnect, "select * from msubscriberlist where mobileNo='$mobileNo' ");
	
    // 		$sqlCheck=mysqli_query($dbconnect, "select * from msubscriberlist where mobileNo='$mobileNo' or gcmKey='$gcmKey' ");
		
	if(mysqli_num_rows($sqlCheck) > 0)
	{
		$displaySubscriber = mysqli_fetch_assoc($sqlCheck);
	    $subscriberId = $displaySubscriber['subscriberId'];
		
		if($otpToBeSend == 1)
		{
		
			$sqlInsert=mysqli_query($dbconnect, "update msubscriberlist set name='$name',gcmKey='$gcmKey',otp='$otp',userCountryId='$countryId',userCityId='$cityId',IP = '$IP',Date='$Date',Time='$Time' where mobileNo='$mobileNo'");
			
			//returning back subscriber id and otp
			$sql = "select msl.subscriberId , msl.otp , msl.profilePicUrl , msg.geographyId, msg.geographyCode from msubscriberlist msl left join msubscribergeography msg on msg.subscriberId=msl.subscriberId WHERE msl.mobileNo='$mobileNo'";
// 			$sql = "select * from msubscriberlist where mobileNo='$mobileNo' ";
            $sql1 = "SELECT * FROM msubscribergeography WHERE subscriberId=$subscriberId";
            $resp = mysqli_query($dbconnect, $sql1);
            
            $sqlquery = mysqli_query($dbconnect, $sql);
            $sqlr = mysqli_fetch_assoc($sqlquery);
			$payloaddata['subscriberId']=$displaySubscriber['subscriberId'];
			$payloaddata['otp']=$sqlr['otp'];
			$payloaddata['profilePicUrl']=$displaySubscriber['profilePicUrl'];
			
            $geographyCode=array();
            $geographyId=array();
            $data=mysqli_num_rows($resp);
            if($data > 0){
               
    			while($data=mysqli_fetch_assoc($resp)){
        			$geographyId[]=$data['geographyId'];
        			$geographyCode[]=$data['geographyCode'];
    			}
            }else{
                $sql = "select * from msubscriberlist where mobileNo='$mobileNo' ";
                $geographyId[]="3,2,2,2";
    			$geographyCode[]="r4,c4,c2,c3";
            }
			$payloaddata['geographyId']=$geographyId;
			$payloaddata['geographyCode']=$geographyCode;

		}
		else if($otpToBeSend == 0)
		{
		    // for filter api details
		    //   echo 'filter';
			$sqlInsert=mysqli_query($dbconnect, "update msubscriberlist set gcmKey='$gcmKey',IP = '$IP',Date='$Date',Time='$Time' where mobileNo='$mobileNo'");
			
			//returning back subscriber id and otp
			$sql = "select msl.subscriberId , msl.otp , msl.profilePicUrl , msg.geographyId, msg.geographyCode from msubscriberlist msl inner join msubscribergeography msg on msg.subscriberId=msl.subscriberId WHERE msl.mobileNo='$mobileNo'";
			
			$sqlDelete=mysqli_query($dbconnect, "delete from msubscribergeography where subscriberId ='$subscriberId'");
			$g=explode(",",$geographyid);
			
			$geographyLength = sizeof($g);
			
			for ($len=0;$len < $geographyLength; $len++) 
			{
				$index = $g[$len];
				$city = 'c';
				$region = 'r';
				$country = 'CON';
				$country = strpos($index, $country);
				$city = strpos($index, $city);
				$region = strpos($index, $region);
				
				if($index == 'none')
				{
					if($len == 0)
					{
						$areaId = 2;
					}
					else if($len == 1)
					{
						$areaId = 3;
					}
					else if($len == 2)
					{
						$areaId = 1;
					}
					$index = 0;
				}
				else
				{
					if ($country !== false)
					{
						 $areaId = 1;
					}
					else if ($city  !== false)
					{
						 $areaId = 2;   	
					}
					else if ($region !== false)
					{
						 $areaId = 3;
					}
					else
					{
						$areaId = 0;
					}
				}
				
				//echo "insert into msubscribergeography set subscriberId ='$subscriberId',geographyId='$areaId',geographyCode='$index'";				
				$sqlInsert1=mysqli_query($dbconnect, "insert into msubscribergeography set subscriberId ='$subscriberId',geographyId='$areaId',geographyCode='$index'");
				$resp = mysqli_query($dbconnect, $sql);
    			$resp1 = mysqli_query($dbconnect, $sql);
        		$data=mysqli_fetch_assoc($resp);
        		$payloaddata['subscriberId']=$data['subscriberId'];
        		$payloaddata['otp']=$data['otp'];
        		$payloaddata['profilePicUrl']=$data['profilePicUrl'];
        		
        		$geographyCode=array();
                $geographyId=array();
                
        		while($data=mysqli_fetch_assoc($resp1)){
        			$geographyId[]=$data['geographyId'];
        			$geographyCode[]=$data['geographyCode'];
        		}
        		
        
        		$payloaddata['geographyId']=$geographyId;
        		$payloaddata['geographyCode']=$geographyCode;
				
			}
			

			
		}
	
	}
	else
	{
	    // for registration api details
        // 		echo 'inserting into msubscriberlist';
		$sqlInsert=mysqli_query($dbconnect, "insert into msubscriberlist set name='$name',mobileNo='$mobileNo',otp='$otp',profilePicUrl='$profilePic',gcmKey='$gcmKey',userCountryId='$countryId',userCityId='$cityId',IP = '$IP',Date='$Date',Time='$Time'");
		
        $subscriberId=mysqli_insert_id($dbconnect);
        
		//returning back subscriber id and otp

		$sql = "select msl.subscriberId , msl.otp , msl.profilePicUrl , msg.geographyId, msg.geographyCode from msubscriberlist msl left join msubscribergeography msg on msg.subscriberId=msl.subscriberId WHERE msl.subscriberId=$subscriberId"; 
		
        $resp = mysqli_query($dbconnect, $sql);
		$data=mysqli_fetch_assoc($resp);
		$payloaddata['subscriberId']=$data['subscriberId'];
		$payloaddata['otp']=$data['otp'];
		$payloaddata['profilePicUrl']=$data['profilePicUrl'];
		
		$geographyCode=array();
        $geographyId=array();
        
// 		while($data=mysqli_fetch_assoc($resp)){
            $geographyId[]="3,2,2,2";
			$geographyCode[]="r4,c4,c2,c3";
// 		}
		

		$payloaddata['geographyId']=$geographyId;
		$payloaddata['geographyCode']=$geographyCode;

 
	} 
	//excecute SQL statement
	$result = mysqli_query($dbconnect, $sql);
 
    if(mysqli_num_rows($result) > 0)
    {
        // $datajson='';
        // while($data=mysqli_fetch_object($result));
        
        $json['responseCode']="1";
		$json['message']="Success";
		$json['Payload']=$payloaddata;
		
	    echo json_encode($json,JSON_UNESCAPED_UNICODE);
    }
    else
    {
		$code = array('responseCode' => '0','message' => 'Record not found'); 
		echo json_encode($code);  
    } 
    
}
else
{
	$code = array('responseCode' => '0','message' => 'Query string not found'); 
	echo json_encode($code);
} 


	//sending sms to mobile number
  
	$sql_user = mysqli_query($dbconnect, "SELECT * FROM smsapisetting where sms_api_id='1'");
	$display_sms = mysqli_fetch_assoc($sql_user);

	$user_data["api_key"] = $display_sms['sms_api_key'];
	 $user_data["sender"] = $display_sms['sms_sender_id'];

	$user_data["message"] = str_replace('{#code#}',$otp,$display_sms['sms_text']) ;
	
	$sms_url = $display_sms['sms_url'];
	$user_data["to"] = $mobileNo;
	if($otpToBeSend == 1)
	{
		check_sms($user_data); 
	}
	function check_sms($param) 
	{ 
		$request = ""; 
		foreach($param as $key=>$val)
		{ 
			$request.= $key."=".urlencode($val);
			$request.= "&";
		}
		$request = substr($request, 0, strlen($request)-1);
		$url2 = "http://alertssms.virtuzo.in/api/v3/?method=sms&" .$request;
		


		$Result = file_get_contents($url2,FILE_USE_INCLUDE_PATH);
		 
	} 
  

// close mysqli connection
mysqli_close($dbconnect);