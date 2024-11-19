<?php


$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, "http://alertssms.virtuzo.in/api/v3/?method=sms&api_key=A3bf5d325c78ce37e8167596e17f32deb&sender=PRARNG&message=Your+verification+code+is%3A+712358&to=%2B918279686310");
	$result = curl_exec($ch);
	curl_close($ch);
	
	echo $result;
	file_put_contents('shivam.txt', $result);
?>