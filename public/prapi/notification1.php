 <?php
 include "include/connect.php"; 
//$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti');  
@$chittiLastStatusId = BlockSQLInjection($_REQUEST['chittiLastStatusId']); 
$sql="select id,message,subscriberId,gcmKey,chittiId from notification where flag='pending'"; 
//excecute SQL statement
$result = mysqli_query($dbconnect, $sql);
//echo mysqli_num_rows($result); 
for($i=0;$i< mysqli_num_rows($result); $i++)
{
	$obj=mysqli_fetch_array($result); 
	$id = $obj['id'];
	$key = $obj['gcmKey'];
	$message = $obj['message'];
	$chittiId = $obj['chittiId'];
	sendNotification($id,$key,$message,$chittiId);
	//$sql=mysql_query("update notification set flag ='sent' where flag='pending' and id='$id'"); 
	//echo $result;
}  
function sendNotification($x,$y,$z,$a) 
{	 
		$notificationId = $x;
        $id= $y;
		$messageToSend = $z;
		$chittiId = $a;
		$chitti["chittiId"] = $chittiId;
        $url = 'https://fcm.googleapis.com/fcm/send';
        $priority = "high";
         
		
         $data = json_encode(array(
            "title" => "Prarang",
            "message" => $messageToSend, 
			"payload" => $chitti
        ));
         echo $data;
        $finalData = array(
            'data' => $data
        );
        $fields = array(
            "registration_ids" => array(
                $id
            ),
            "data" => $finalData
        );
		// print_r($fields);


        $headers = array(
            // 'Authorization:key=AIzaSyD7lwy8Q3vdL8yzBBEwKnFwzRhcRqoEAUQ',
            'Authorization:key=AIzaSyDO38MFRdpm7v96ykuO-GxJ_xAboOkuAho',
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