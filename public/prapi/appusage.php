<?php 
    header('Content-type: application/json');
    include "include/connect.php";

    @$SubscriberId = $_REQUEST['subscriberId'];
    @$UserCity = $_REQUEST['userCity'];
    @$Flag = $_REQUEST['flag'];
    @$CurrentDate = date('Y-m-d H:i:s');
    if(@$SubscriberId != ''){
        if($Flag =='Start'){

            $sqlInsert=mysqli_query($dbconnect, "insert into appusage set subscriberId='$SubscriberId',AppStartTime='$CurrentDate',UserCity='$UserCity'");
            $appusageInsertId=mysqli_insert_id($dbconnect);
            $msubscriber=mysqli_query($dbconnect, "select name,mobileNo from msubscriberlist where subscriberId='$SubscriberId' ");
            $displaySubscriber = mysqli_fetch_assoc($msubscriber);
            $UserName = $displaySubscriber['name'];
            $MobileNumber = $displaySubscriber['mobileNo'];
            $sqlCheck=mysqli_query($dbconnect, "select * from misreport where SubscriberId='$SubscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d') ");
	    
            if(mysqli_num_rows($sqlCheck) > 0)
            {
                $displaySubscriber = mysqli_fetch_assoc($sqlCheck);

                $AppUsageTime = $displaySubscriber['AppUsageTime'];
                $appusage=mysqli_query($dbconnect, "select * from appusage where subscriberId='$SubscriberId' and UserCity='$UserCity' and DATE_FORMAT(AppStartTime, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  order by Id desc  ");
                $displayappusage = mysqli_fetch_assoc($appusage);
                $AppStartTime = $displayappusage['AppStartTime'];

                $datetime1 = new DateTime($AppStartTime);
                $datetime2 = new DateTime($CurrentDate);
                $interval = $datetime1->diff($datetime2);
                $minutes = $interval->format('%i');

                $AppUsageTime = (int)((int)$AppUsageTime+(int)$minutes);
                
                $sqlInsert=mysqli_query($dbconnect, "Update misreport set UpdatedDate='$CurrentDate' where SubscriberId='$SubscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
                $appusageInsertId=mysqli_insert_id($dbconnect);

                // $code = array('responseCode' => '1','message' => 'Update Success'); 
	            // echo json_encode($code);
                $sql = "select * from misreport where SubscriberId='$SubscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ";
                    
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

            }else{
                
                $sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', SubscriberId='$SubscriberId',UserCity='$UserCity' ");
                $appusageInsertId=mysqli_insert_id($dbconnect);

                // $code = array('responseCode' => '1','message' => 'insert Success'); 
	            // echo json_encode($code);
                // $sql=mysqli_query($dbconnect, "select * from misreport where SubscriberId='$SubscriberId' order by Id desc ");
                $sql="select * from misreport where SubscriberId='$SubscriberId' and UserCity='$UserCity' order by Id desc ";    
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

        }else if($Flag =='End'){

            $appusage=mysqli_query($dbconnect, "select * from appusage where subscriberId='$SubscriberId' and UserCity='$UserCity' and DATE_FORMAT(AppStartTime, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  order by Id desc  ");
            if(mysqli_num_rows($appusage) > 0){

                $displayappusage = mysqli_fetch_assoc($appusage);
                $TodayappUsageTime = $displayappusage['CreatedDate'];

                $sqlInsert=mysqli_query($dbconnect, "insert into appusage set subscriberId='$SubscriberId',AppEndTime='$CurrentDate', UserCity='$UserCity'");
                $appusageInsertId=mysqli_insert_id($dbconnect);

                $msubscriber=mysqli_query($dbconnect, "select name,mobileNo from msubscriberlist where subscriberId='$SubscriberId' ");
                $displaySubscriber = mysqli_fetch_assoc($msubscriber);

                $UserName = $displaySubscriber['name'];
                $MobileNumber = $displaySubscriber['mobileNo'];
                $sqlCheck=mysqli_query($dbconnect, "select * from misreport where SubscriberId='$SubscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d') ");
            
                if(mysqli_num_rows($sqlCheck) > 0)
                {
                    $displaySubscriber = mysqli_fetch_assoc($sqlCheck);
                    $AppStartTime = $displayappusage['AppStartTime'];
                    $AppUsageTime = $displaySubscriber['AppUsageTime'];

                    $datetime1 = new DateTime($AppStartTime);
                    $datetime2 = new DateTime($CurrentDate);
                    $interval = $datetime1->diff($datetime2);
                    $minutes = $interval->format('%i');
                    $AppUsageTime = (int)((int)$AppUsageTime+(int)$minutes);

                    $sqlInsert=mysqli_query($dbconnect, "Update misreport set AppUsageTime='$AppUsageTime', UpdatedDate='$CurrentDate' where SubscriberId='$SubscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ");
                    $appusageInsertId=mysqli_insert_id($dbconnect);

                    // $code = array('responseCode' => '1','message' => 'Update Success'); 
                    // echo json_encode($code);
                    // $sql="select * from misreport where SubscriberId='$SubscriberId' order by Id desc ";
                    $sql = "select * from misreport where SubscriberId='$SubscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  ";
                 
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

                }else{


                    $sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', SubscriberId='$SubscriberId',UserCity='$UserCity'");
                    $appusageInsertId=mysqli_insert_id($dbconnect);

                    // $code = array('responseCode' => '1','message' => 'insert Success'); 
                    // echo json_encode($code);
                    $sql="select * from misreport where SubscriberId='$SubscriberId' and UserCity='$UserCity' order by Id desc ";
                   
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
            }else{
                $appusage=mysqli_query($dbconnect, "select * from appusage where subscriberId='$SubscriberId' and UserCity='$UserCity' and DATE_FORMAT(AppStartTime, '%Y-%m-%d') = DATE_FORMAT('$CurrentDate', '%Y-%m-%d')  order by Id desc  ");
                $displayappusage = mysqli_fetch_assoc($appusage);
                $AppStartTime = $displayappusage['AppStartTime'];

                $sqlInsert=mysqli_query($dbconnect, "insert into appusage set subscriberId='$SubscriberId',AppEndTime='$CurrentDate',UserCity='$UserCity'");
                $appusageInsertId=mysqli_insert_id($dbconnect);

                $msubscriber=mysqli_query($dbconnect, "select name,mobileNo from msubscriberlist where subscriberId='$SubscriberId' ");
                $displaySubscriber = mysqli_fetch_assoc($msubscriber);

                $UserName = $displaySubscriber['name'];
                $MobileNumber = $displaySubscriber['mobileNo'];

                $sqlCheck=mysqli_query($dbconnect, "select * from misreport where SubscriberId='$SubscriberId' and UserCity='$UserCity' order by Id desc ");
                $displaySubscriber = mysqli_fetch_assoc($sqlCheck);

                $AppUsageTime = $displaySubscriber['AppUsageTime'];
                $CreatedDate = $displaySubscriber['CreatedDate'];

                $datetime1 = new DateTime($AppStartTime);
                $datetime2 = new DateTime($CurrentDate);
                $interval = $datetime1->diff($datetime2);
                $minutes = $interval->format('%i');
                $AppUsageTime = (int)((int)$AppUsageTime+(int)$minutes);
                $sqlInsert=mysqli_query($dbconnect, "Update misreport set AppUsageTime='$AppUsageTime', UpdatedDate='$CurrentDate' where SubscriberId='$SubscriberId' and UserCity='$UserCity' and DATE_FORMAT(CreatedDate, '%Y-%m-%d') = DATE_FORMAT('$CreatedDate', '%Y-%m-%d')  ");
                $appusageInsertId=mysqli_insert_id($dbconnect);

                $sqlInsert=mysqli_query($dbconnect, "insert into misreport set UserName='$UserName', MobileNumber='$MobileNumber', SubscriberId='$SubscriberId',UserCity='$UserCity' ");
                $appusageInsertId=mysqli_insert_id($dbconnect);

                // $code = array('responseCode' => '1','message' => 'insert Success'); 
                // echo json_encode($code);
                $sql="select * from misreport where SubscriberId='$SubscriberId' and UserCity='$UserCity' order by Id desc ";
                      
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
            // $code = array('responseCode' => '0','message' => 'Flag End coding'); 
	        // echo json_encode($code);
        }else{
            $code = array('responseCode' => '0','message' => 'Flag does not match'); 
	        echo json_encode($code);
        }

    }else{
        $code = array('responseCode' => '0','message' => 'subscriber not found'); 
	    echo json_encode($code);
    }

    // $_REQUEST['chittiId'] = 5671;
    // $UserName='irfan';
    // $MobileNumber='+919828646744';
    // $EmailId='irfan@gmail.com';
    // $DateOfJoining='';
    // $AppDownloadDate='';
    // $AppUsageTime='';
    //$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti');
    //$link = mysqli_connect('localhost', 'prarang_1125', '#prarang1125#', 'prarang_riverSanskiriti'); 
    // $IP = $_SERVER['REMOTE_ADDR'];
    // @$subscriberId = BlockSQLInjection($_REQUEST['subscriberId']);
    // @$chittiId = BlockSQLInjection($_REQUEST['chittiId']); 
    // // @$isLiked = BlockSQLInjection($_REQUEST['isLiked']);
    // // 'CALL get_user(1, @first, @last)' 
    // $likeDate = date("d-m-Y");
    // CALL test_proc(?, ?, ?, @sum, @product, @average);
	// $Params=array($subscriberId,$chittiId);
	// $CallProcedure="call sp_MisReport(?, ?, '$subscriberId','$chittiId')";
    // $Query = mysqli_query($dbconnect,$CallProcedure);
	// $Result=mysqli_fetch_array($Query);
    // // die;
    // print_r($Query);
    // echo json_encode($Query);

    // $stmt = $dbconnect->prepare("CALL sp_MisReport(?,?)");
    // $stmt->bind_param("s", @$subscriberId,@$chittiId);

    // $stmt->execute();

    // $result = $stmt->get_result();
    // $response = $result->fetch_all(MYSQLI_ASSOC);
    // echo json_encode($response);



    // $mysqli = mysqli_connect();
    // $call = mysqli_prepare($dbconnect, 'CALL test_proc(?, ?, ?, @sum, @product, @average)');
    // $call = mysqli_prepare($dbconnect, 'CALL sp_MisReport(?, ?)');
    // mysqli_stmt_bind_param($call, $subscriberId, $chittiId);
    // mysqli_stmt_execute($call);

    // $select = mysqli_query($dbconnect, 'SELECT @UserName, @MobileNumber');
    // $result = mysqli_fetch_assoc($select);
    // $procOutput_sum     = $result['@sum'];

    // $stmt = $dbconnect->prepare('call sp_MisReport(?, ?)');
    // $stmt->bind_param('dd', $subscriberId,$chittiId);
    // $stmt->bind_param('chittiId', );
    // $param = [$subscriberId, $chittiId];

    /* bind parameters for markers */
    // $stmt->bind_param($subscriberId, $chittiId);

    /* execute query */
    // $stmt->execute();

    // $stmt->bind_result($UserName,$MobileNumber);
    // $result=array();
    // while($stmt->fetch()){
    //     $result['misreport'][] = array( "UserName"=>$UserName ,"MobileNumber"=>$MobileNumber);
    // }

    // printf("%s is in district %s\n", $city, $district);
    // echo json_encode($result);
    // die;
    /* bind result variables */
    // $stmt->bind_result($district);

    // /* fetch value */
    // $stmt->fetch();

?>