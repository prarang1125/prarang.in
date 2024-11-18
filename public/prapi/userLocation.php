<?php 
header('Content-type: application/json');
include "include/connect.php";
//$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti'); 
//$link = mysqli_connect('localhost', 'prarang_1125', '#prarang1125#', 'prarang_riverSanskiriti');
 $languageCode = BlockSQLInjection($_REQUEST['languageCode']); 
//  die;
if($languageCode != '') 
{
    if($languageCode == 'en')
	{
		$sql = "select countryId,countryNameInEnglish as countryUnicode from userCountry where isActive='1'"; 
	}
    else if($languageCode == 'hi')
	{
		$sql = "select countryId,countryNameInHindi as countryUnicode from userCountry  where isActive='1'"; 
	}	  
	$result = mysqli_query($dbconnect, $sql);
	$json['responseCode']="1";
	$json['message']="Success";
	$json['Payload']=array();
	$login['login']=array();
	$filter['filter']=array();
	if(mysqli_num_rows($result) > 0)
	{		
		for ($i=0;$i<mysqli_num_rows($result);$i++) 
		{  
			$country['country'][$i]=mysqli_fetch_object($result); 
		}	
		 array_push($login["login"], $country);
    }
	else
	{
		if($languageCode == 'en')
		{
		$code = array('responseCode' => '0','message' => 'Record not found'); 
		}
		else
		{
		$code = array('responseCode' => '0','message' => 'रिकॉर्ड उपलब्ध नहीं है।');	
		}	
		echo json_encode($code);  
    }
	
	
	
	if($languageCode == 'en')
	{
		$sql1 = "select cityId,cityNameInEnglish as cityUnicode,countryId from userCity  where isActive='1'";
	}
	else if($languageCode == 'hi')
	{
		$sql1 =  "select cityId,cityNameInHindi  as cityUnicode,countryId from userCity  where isActive='1'";	
	}	
		
	$resultCity = mysqli_query($dbconnect, $sql1);
	if(mysqli_num_rows($resultCity) > 0)
	{
		for($j=0; $j < mysqli_num_rows($resultCity); $j++ )
		{  
			$city['city'][$j]=mysqli_fetch_object($resultCity);
		}
		array_push($login["login"], $city);		 	 
	}	
    else
	{
		if($languageCode == 'en')
		{
		$code = array('responseCode' => '0','message' => 'Record not found'); 
		}
		else
		{
		$code = array('responseCode' => '0','message' => 'रिकॉर्ड उपलब्ध नहीं है।');	
		}	
		echo json_encode($code);  
    }

	
		
	
	if($languageCode == 'en')
	{
		$sql2 = "select countryId,countryCode,countryNameInEnglish as countryName from mcountry where isActive='1'";
	}
	else if($languageCode == 'hi')
	{
		$sql2 =  "select countryId,countryCode,countryNameInUnicode as countryName from mcountry where isActive='1'";	
	}	
		
	$result1 = mysqli_query($dbconnect, $sql2);
	if(mysqli_num_rows($result1) > 0)
	{
		
		if($languageCode == 'en')
		{
		$country1['country'][0]= array('countryId' => '0','countryCode' => 'CON0','countryName' => 'All'); 
		}
		else if($languageCode == 'hi')
		{
		$country1['country'][0]= array('countryId' => '0','countryCode' => 'CON0','countryName' => 'सभी');	
		}
		for($k=1; $k <= mysqli_num_rows($result1); $k++ )
		{  
	        
			$country1['country'][$k]=mysqli_fetch_object($result1);
		}
		array_push($filter["filter"], $country1);		 	 
	}	
    else
	{
		if($languageCode == 'en')
		{
		$code = array('responseCode' => '0','message' => 'Record not found'); 
		}
		else
		{
		$code = array('responseCode' => '0','message' => 'रिकॉर्ड उपलब्ध नहीं है।');	
		}	
		echo json_encode($code);  
    }
	
	
	
	if($languageCode == 'en')
	{
		$sql3 = "select regionId,regionCode,regionnameInEnglish as regionName from mregion where isActive='1' ";
	}
	else if($languageCode == 'hi')
	{
		$sql3 = "select regionId,regionCode,regionnameInUnicode as regionName from mregion where isActive='1' ";	
	}	
		
	$resultRegion = mysqli_query($dbconnect, $sql3);
	if(mysqli_num_rows($resultRegion) > 0)
	{
		if($languageCode == 'en')
		{
		$region['region'][0]= array('regionId' => '0','regionCode' => 'r0','regionName' => 'All'); 
		}
		else if($languageCode == 'hi')
		{
		$region['region'][0]= array('regionId' => '0','regionCode' => 'r0','regionName' => 'सभी'); 	
		}
		for($l=1; $l <= mysqli_num_rows($resultRegion); $l++ )
		{  
			$region['region'][$l]=mysqli_fetch_object($resultRegion);
		}
		array_push($filter["filter"], $region);		 	 
	}	
    else
	{
		if($languageCode == 'en')
		{
		$code = array('responseCode' => '0','message' => 'Record not found'); 
		}
		else
		{
		$code = array('responseCode' => '0','message' => 'रिकॉर्ड उपलब्ध नहीं है।');	
		}	
		echo json_encode($code);  
    }
	

	
	if($languageCode == 'en')
	{
	    $sql3 = "select regionId,regionCode,regionnameInEnglish as regionName from mregion where isActive='1'";
		$sql4 = "select cityId,cityCode,citynameInEnglish as cityName from mcity where isActive='1' order by citynameInEnglish asc";
	}
	else if($languageCode == 'hi')
	{
	    $sql3 = "select regionId,regionCode,regionnameInUnicode as regionName from mregion where isActive='1' ";
		$sql4 =  "select cityId,cityCode,citynameInUnicode as cityName from mcity where isActive='1' order by citynameInUnicode asc";	
	}	
	$city1=array();	
	$resultCity1 = mysqli_query($dbconnect, $sql4);
	if(mysqli_num_rows($resultCity1) > 0)
	{
		if($languageCode == 'en')
		{
		    $city1['city'][0]= array('cityId' => '0','cityCode' => 'c0','cityName' => 'All'); 
		}
		else if($languageCode == 'hi')
		{
		    $city1['city'][0]= array('cityId' => '0','cityCode' => 'c0','cityName' => 'सभी');
		}
		$resp = mysqli_query($dbconnect, $sql3);
	    $data=mysqli_fetch_assoc($resp);
		$cityId=$data['regionId'];
		$cityCode=$data['regionCode'];
		$cityName=$data['regionName'];
		$cityNameF=stristr($data['regionName'],' ',true);
		$cityNameL=stristr($data['regionName'],'-',false);
		$cityName = $cityNameF.$cityNameL;
	    $city1['city'][] = array( "cityId"=>$cityId ,"cityCode"=>$cityCode,"cityName"=>$cityName);
	    while($data=mysqli_fetch_assoc($resultCity1)){
			$cityId=$data['cityId'];
			$cityCode=$data['cityCode'];
			$cityName=$data['cityName'];
		  
		    $city1['city'][] = array( "cityId"=>$cityId ,"cityCode"=>$cityCode,"cityName"=>$cityName);
	    }
		
		 
		array_push($filter["filter"], $city1);		 	 
	}	
    else
	{
		if($languageCode == 'en')
		{
		$code = array('responseCode' => '0','message' => 'Record not found'); 
		}
		else
		{
		$code = array('responseCode' => '0','message' => 'रिकॉर्ड उपलब्ध नहीं है।');	
		}	
		echo json_encode($code);  
    }
	
	
	
	
	array_push($json['Payload'], $login);
    array_push($json['Payload'], $filter);	
	echo json_encode($json,JSON_UNESCAPED_UNICODE);
} 
else
{
	$code = array('responseCode' => '0','message' => 'Language Code Not Found'); 
	echo json_encode($code);  
}
// close mysql connection
mysqli_close($dbconnect);