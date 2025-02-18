<?php

global $conn;
$city_code = getData('city_code');

if ($city_code == null) {
    response(['status' => 'error', 'message' => 'Requried:city_code.'], 404);
}

$query = "
    SELECT
        fb_profile.`name`,
        fb_profile.`profile_link`,
        fb_profile.`city_code`,
        fb_profile.`like` AS likes,
        fb_profile.`month`,
        fb_profile.`year`
    FROM fb_profile
    WHERE city_code = ?
    ORDER BY
        fb_profile.`year` DESC,
        fb_profile.`month` DESC,
        fb_profile.`like` DESC
";

try {
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $city_code);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    $processedMonths = [];
    while ($row = $result->fetch_assoc()) {
        $monthKey = $row['year'] . '-' . $row['month'];

        if (isset($processedMonths[$monthKey]) && $processedMonths[$monthKey] >= 3) {
            continue;
        }

        $data[] = $row;

        if (!isset($processedMonths[$monthKey])) {
            $processedMonths[$monthKey] = 1;
        } else {
            $processedMonths[$monthKey]++;
        }
    }

    $groupedData = [];
    foreach ($data as $item) {
        $monthGroup = $item['month'];

        if (!isset($groupedData[$monthGroup])) {
            $groupedData[$monthGroup] = [];
        }

        $groupedData[$monthGroup][] = $item;
    }

    // Continue processing your data ...



    response(['status' => 'success', 'data' => $groupedData], 200);
} catch (Exception $e) {
    response(['status' => 'error', 'message' => "Unable to fetch data, Server error."], 500);
}



// function numberToMonth($monthNumber) {
//     $dateObj = DateTime::createFromFormat('!m', $monthNumber);
//     return $dateObj->format('F');  // 'F' gives the full textual representation of a month
// }

// echo numberToMonth(6);  // Outputs: June
// echo numberToMonth(8);  // Outputs: August