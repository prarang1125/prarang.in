<?php
global $conn;
// $city_code = getData('city_code');
$start_date = getData('start_date');
$end_date = getData('end_date');
if ($end_date == null || $start_date == null) {
    response(['status' => 'error', 'message' => 'Requried:city_code,start_date,end_date.'], 404);
}
$query = "SELECT vg.geographycode AS city_code,chitti.chittiId AS post_id,  colorinfo.id AS emotion_id, colorinfo.name AS emotion, colorinfo.colorname AS emotion_color, chitti.totalViewerCount AS reach, chitti.fb_link_click, chitti.dateOfApprove AS post_date
FROM chitti
JOIN colorinfo ON chitti.color_value = colorinfo.id
JOIN vChittiGeography AS vcg ON vcg.chittiId = chitti.chittiId
JOIN vGeography AS vg ON vg.geographycode = vcg.Geography
WHERE STR_TO_DATE(chitti.dateOfApprove, '%d-%m-%Y') BETWEEN ? AND ?";
try {
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $start_date, $end_date);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    response(['status' => 'success', 'data' => $data], 200);
} catch (Exception $e) {
    response(['status' => 'error', 'message' => "Unable to fetch data, Server error."], 500);
}
