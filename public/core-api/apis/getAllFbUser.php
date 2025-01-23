<?php
global $conn;

$city_code = isset($_GET['city_code']) ? $_GET['city_code'] : null;
if ($city_code === null) {
    response(['status' => 'error', 'message' => 'Required: city_code.'], 400);
}

$query = "SELECT * FROM `fb_profile`
WHERE year = (SELECT MAX(year) FROM `fb_profile`)
AND month = (SELECT MAX(month) FROM `fb_profile` WHERE year = (SELECT MAX(year) FROM `fb_profile`))
AND city_code= ? ORDER By `like` desc  LIMIT 300";

try {
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $city_code);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
  
    foreach ($data as $item) {
        $groupKey = $item['year'] . '-' . $item['month'];
        if (!isset($groupedData[$groupKey])) {
            $groupedData[$groupKey] = [];
        }
        $groupedData[$groupKey][] = $item;
    }
        $json = json_encode($groupedData);

    $json = json_encode($groupedData);


     response(['status' => 'success', 'data' => $groupedData], 200);
    
} catch (Exception $e) {
    response(['status' => 'error', 'message' => "Unable to fetch data, Server error."], 500);
}




