<?php
global $conn;
// die();
$city_code = getData('city_code');
if ($city_code == null) {
    response(['status' => 'error', 'message' => 'Requried:city_code.'], 404);
}
// $query = "(
//     SELECT
//         `chitti`.`chittiId`,
//         `chitti`.`dateOfApprove`,
//         `chitti`.`totalViewerCount`,
//         `img`.`imageUrl`,
//         DATE_FORMAT(
//             DATE_SUB(CURDATE(), INTERVAL 1 MONTH),
//             '%M %Y'
//         ) AS `MonthGroup`,
//         `vg`.`geography`
//     FROM `chitti`
//         JOIN `chittiimagemapping` AS `img` ON `img`.`chittiId` = `chitti`.`chittiId`
//         JOIN `vChittiGeography` AS `vcg` ON `vcg`.`chittiId` = `chitti`.`chittiId`
//         JOIN `vGeography` AS `vg` ON `vg`.`geographycode` = `vcg`.`Geography`
//         JOIN `facity` ON `facity`.`chittiId` = `chitti`.`chittiId`
//     WHERE
//         vg.geographycode = ?
//         AND STR_TO_DATE(
//             `chitti`.`dateOfApprove`,
//             '%d-%m-%Y %h:%i %p'
//         ) BETWEEN DATE_SUB(
//             LAST_DAY(
//                 DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
//             ),
//             INTERVAL 1 MONTH
//         )
//         AND LAST_DAY(
//             DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
//         )
//     ORDER BY
//         `chitti`.`totalViewerCount` DESC
//     LIMIT 3
// )
// UNION ALL (
//     SELECT
//         `chitti`.`chittiId`,
//         `chitti`.`dateOfApprove`,
//         `chitti`.`totalViewerCount`,
//         `img`.`imageUrl`,
//         DATE_FORMAT(
//             DATE_SUB(CURDATE(), INTERVAL 2 MONTH),
//             '%M %Y'
//         ) AS `MonthGroup`,
//         `vg`.`geography`
//     FROM `chitti`
//         JOIN `chittiimagemapping` AS `img` ON `img`.`chittiId` = `chitti`.`chittiId`
//         JOIN `vChittiGeography` AS `vcg` ON `vcg`.`chittiId` = `chitti`.`chittiId`
//         JOIN `vGeography` AS `vg` ON `vg`.`geographycode` = `vcg`.`Geography`
//         JOIN `facity` ON `facity`.`chittiId` = `chitti`.`chittiId`
//     WHERE
//         vg.geographycode = ?
//         AND STR_TO_DATE(
//             `chitti`.`dateOfApprove`,
//             '%d-%m-%Y %h:%i %p'
//         ) BETWEEN DATE_SUB(
//             LAST_DAY(
//                 DATE_SUB(CURDATE(), INTERVAL 2 MONTH)
//             ),
//             INTERVAL 1 MONTH
//         )
//         AND LAST_DAY(
//             DATE_SUB(CURDATE(), INTERVAL 2 MONTH)
//         )
//     ORDER BY
//         `chitti`.`totalViewerCount` DESC
//     LIMIT 3
// )
// UNION ALL (
//     SELECT
//         `chitti`.`chittiId`,
//         `chitti`.`dateOfApprove`,
//         `chitti`.`totalViewerCount`,
//         `img`.`imageUrl`,
//         DATE_FORMAT(
//             DATE_SUB(CURDATE(), INTERVAL 3 MONTH),
//             '%M %Y'
//         ) AS `MonthGroup`,
//         `vg`.`geography`
//     FROM `chitti`
//         JOIN `chittiimagemapping` AS `img` ON `img`.`chittiId` = `chitti`.`chittiId`
//         JOIN `vChittiGeography` AS `vcg` ON `vcg`.`chittiId` = `chitti`.`chittiId`
//         JOIN `vGeography` AS `vg` ON `vg`.`geographycode` = `vcg`.`Geography`
//         JOIN `facity` ON `facity`.`chittiId` = `chitti`.`chittiId`
//     WHERE
//         vg.geographycode = ?
//         AND STR_TO_DATE(
//             `chitti`.`dateOfApprove`,
//             '%d-%m-%Y %h:%i %p'
//         ) BETWEEN DATE_SUB(
//             LAST_DAY(
//                 DATE_SUB(CURDATE(), INTERVAL 3 MONTH)
//             ),
//             INTERVAL 1 MONTH
//         )
//         AND LAST_DAY(
//             DATE_SUB(CURDATE(), INTERVAL 3 MONTH)
//         )
//     ORDER BY
//         `chitti`.`totalViewerCount` DESC
//     LIMIT 3
// )";

$query = "
    (
        SELECT
            chitti.chittiId,
             chitti.Title,
           
            chitti.dateOfApprove,
            chitti.totalViewerCount,
            img.imageUrl,
            DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH), '%M %Y') AS MonthGroup,
            vg.geography
        FROM chitti
        JOIN chittiimagemapping AS img ON img.chittiId = chitti.chittiId
        JOIN vChittiGeography AS vcg ON vcg.chittiId = chitti.chittiId
        JOIN vGeography AS vg ON vg.geographycode = vcg.Geography
       
        WHERE
            vg.geographycode = ?
            AND STR_TO_DATE(chitti.dateOfApprove, '%d-%m-%Y %h:%i %p')
                BETWEEN DATE_SUB(LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)), INTERVAL 1 MONTH)
                AND LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))
        ORDER BY CONVERT(chitti.totalViewerCount, SIGNED) DESC
        LIMIT 3
    )
    UNION ALL
    (
        SELECT
            chitti.chittiId,
             chitti.Title,
            chitti.dateOfApprove,
            chitti.totalViewerCount,
            img.imageUrl,
            DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 2 MONTH), '%M %Y') AS MonthGroup,
            vg.geography
        FROM chitti
        JOIN chittiimagemapping AS img ON img.chittiId = chitti.chittiId
        JOIN vChittiGeography AS vcg ON vcg.chittiId = chitti.chittiId
        JOIN vGeography AS vg ON vg.geographycode = vcg.Geography
      
        WHERE
            vg.geographycode = ?
            AND STR_TO_DATE(chitti.dateOfApprove, '%d-%m-%Y %h:%i %p')
                BETWEEN DATE_SUB(LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 2 MONTH)), INTERVAL 1 MONTH)
                AND LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 2 MONTH))
        ORDER BY CONVERT(chitti.totalViewerCount, SIGNED) DESC
        LIMIT 3
    )
    UNION ALL
    (
        SELECT
            chitti.chittiId,
            chitti.Title,
            chitti.dateOfApprove,
            chitti.totalViewerCount,
            img.imageUrl,
            DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 3 MONTH), '%M %Y') AS MonthGroup,
            vg.geography
        FROM chitti
        JOIN chittiimagemapping AS img ON img.chittiId = chitti.chittiId
        JOIN vChittiGeography AS vcg ON vcg.chittiId = chitti.chittiId
        JOIN vGeography AS vg ON vg.geographycode = vcg.Geography
       
        WHERE
            vg.geographycode = ?
            AND STR_TO_DATE(chitti.dateOfApprove, '%d-%m-%Y %h:%i %p')
                BETWEEN DATE_SUB(LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 3 MONTH)), INTERVAL 1 MONTH)
                AND LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 3 MONTH))
        ORDER BY CONVERT(chitti.totalViewerCount, SIGNED) DESC
        LIMIT 3
    )
";

// $query="SELECT chittiId, totalViewerCount
// FROM chitti
// ORDER BY CONVERT(chitti.totalViewerCount, SIGNED) DESC
// LIMIT 60";
try {
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $city_code, $city_code, $city_code);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $groupedData = [];

    foreach ($data as $item) {
        $monthGroup = $item['MonthGroup'];

        if (!isset($groupedData[$monthGroup])) {
            $groupedData[$monthGroup] = [];
        }

        $groupedData[$monthGroup][] = $item;
    }


    response(['status' => 'success', 'data' => $groupedData], 200);
} catch (Exception $e) {
    response(['status' => 'error', 'message' => "Unable to fetch data, Server error."], 500);
}
