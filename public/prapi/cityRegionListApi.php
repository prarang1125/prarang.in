<?php
header('Content-type: application/json');
include "include/connect.php";

$languageCode = BlockSQLInjection($_REQUEST['languageCode']);

if ($languageCode != '') {
    if ($languageCode == 'en') {
        $sql = "select countryCode as listCode,countryNameInEnglish as languageUnicode from mcountry union select regionCode as listCode,regionnameInEnglish as languageUnicode from mregion union select cityCode as listCode,citynameInEnglish as languageUnicode from mcity ";
    } else if ($languageCode == 'hi') {
        $sql = "select countryCode as listCode,countryNameInUnicode as languageUnicode from mcountry union select regionCode as listCode,regionnameInUnicode as languageUnicode from mregion union select cityCode as listCode,citynameInUnicode as languageUnicode from mcity ";
    }
    $result = mysqli_query($dbconnect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $json['responseCode'] = "1";
        $json['message'] = "Success";
        $json['Payload'] = array();
        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
            $json['Payload'][$i] = mysqli_fetch_object($result);
        }
        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    } else {
        $code = array('responseCode' => '0', 'message' => 'Record not found');
        echo json_encode($code);
    }
} else {
    $code = array('responseCode' => '0', 'message' => 'Record Not Found');
    echo json_encode($code);
}

mysqli_close($dbconnect);
