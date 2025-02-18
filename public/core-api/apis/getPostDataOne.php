<?php
global $conn;
$city_code = getData('city_code');
$start_date = getData('start_date');
$end_date = getData('end_date');
if ($city_code == null || $end_date == null || $start_date == null) {
    response(['status' => 'error', 'message' => 'Requried:city_code,start_date,end_date.'], 404);
}

$query = "SELECT chitti.chittiId AS post_id, img.imageUrl AS main_image_url, tagm.tagId AS tag_id, chitti.totalViewerCount AS reach, chitti.fb_link_click, chitti.dateOfApprove AS post_date
FROM chitti
JOIN chittiimagemapping AS img ON img.chittiId = chitti.chittiId
JOIN chittitagmapping AS tagm ON tagm.chittiId = chitti.chittiId
JOIN vChittiGeography AS vcg ON vcg.chittiId = chitti.chittiId
JOIN vGeography AS vg ON vg.geographycode = vcg.Geography

WHERE STR_TO_DATE(chitti.dateOfApprove, '%d-%m-%Y') BETWEEN ? AND ? AND vg.geographycode = ?";

try {
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $start_date, $end_date, $city_code);
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
