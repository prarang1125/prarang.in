<?php 
include "include/connect.php";
//$link = mysqli_connect('localhost', 'prarang', '#riversanskriti123#', 'prarang_riverSanskiriti');
//$link = mysqli_connect('localhost', 'prarang_1125', '#prarang1125#', 'prarang_riverSanskiriti');
 	
$sql ="select imageId,chittiId,imageUrl from chittiimagemapping where isDefult!='1'";
		
// excecute SQL statement
$result = mysqli_query($dbconnect, $sql);
// die if SQL statement failed
if (!$result) 
{
  http_response_code(404);
  die(mysqli_error($dbconnect));
}
 
  echo '[';
  for ($i=0;$i<mysqli_num_rows($result);$i++) 
  {
	echo $arr1 =  ($i>0?',':'').json_encode(mysqli_fetch_object($result),JSON_UNESCAPED_UNICODE);
  }
  
  echo ']';
 
// close mysqli connection
mysqli_close($dbconnect);

   
