<?php
header('Content-Type: application/json');
include "include/connect.php";

$subscriberId = sanitizeInput($_REQUEST['SubscriberId'] ?? '');
$offset = sanitizeInput($_REQUEST['offset'] ?? 0);
$languageCode = sanitizeInput($_REQUEST['languageCode'] ?? 'en');

if (empty($subscriberId)) {
    sendResponse(0, "Subscriber ID not found.");
    exit;
}

// Get Language ID
$languageId = getLanguageId($languageCode);

// Get Geography Data
$geographyData = getGeographyData($subscriberId, $languageId);

if ($geographyData['error']) {
    sendResponse(0, $geographyData['message']);
    exit;
}

$chittiList = $geographyData['chittiList'] ?? [];
$chittiListString = implode(',', $chittiList);

// Fetch Chitti Data
$chittiData = fetchChittiData($chittiListString, $subscriberId, $offset);

if (empty($chittiData)) {
    sendResponse(0, "No chitti data found.");
} else {
    sendResponse(1, "Success", ['subscriberId' => $subscriberId, 'Payload' => $chittiData]);
}

/**
 * Sanitize input to prevent SQL Injection.
 */
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Send JSON response.
 */
function sendResponse($responseCode, $message, $data = []) {
    echo json_encode(array_merge(['responseCode' => $responseCode, 'message' => $message], $data));
}

/**
 * Get Language ID based on language code.
 */
function getLanguageId($languageCode) {
    global $dbconnect;

    $query = "SELECT id FROM mlanguagescript WHERE language = ?";
    $stmt = $dbconnect->prepare($query);
    $stmt->bind_param('s', $languageCode);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    return $result['id'] ?? null;
}

/**
 * Get Geography Data for the subscriber.
 */
function getGeographyData($subscriberId, $languageId) {
    global $dbconnect;

    $query = "SELECT REPLACE(msubscribergeography.geographyCode, 'c', '') AS areaId
              FROM msubscriberlist
              INNER JOIN msubscribergeography
              ON msubscriberlist.subscriberId = msubscribergeography.subscriberId
              WHERE msubscribergeography.geographyCode = 'c2'
              AND msubscribergeography.subscriberId = ?";
    $stmt = $dbconnect->prepare($query);
    $stmt->bind_param('s', $subscriberId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        return [
            'error' => true,
            'message' => $languageId == 1
                ? 'Sorry, no letters here, pick another geography!'
                : 'माफ़ करे पत्र उपलब्ध नही है, दूसरा भुगोल चुने।',
        ];
    }

    $areaIds = [];
    while ($row = $result->fetch_assoc()) {
        $areaIds[] = $row['areaId'];
    }

    return [
        'error' => false,
        'chittiList' => $areaIds,
    ];
}

/**
 * Fetch Chitti Data based on provided parameters.
 */
function fetchChittiData($chittiList, $subscriberId, $offset) {
    global $dbconnect;

    $offset = max(0, intval($offset));
    $limit = 21;

    $query = "SELECT ch.Title, ch.SubTitle, ch.chittiId, ch.description, ch.languageId, ch.dateOfApprove,
                     IFNULL(cl.likes, 0) AS totalLike,
                     IFNULL(chc.comment, 0) AS totalComment,
                     IFNULL(cl2.isLiked, 'false') AS isLiked,
                     vg.geography, cli.colorcode
              FROM chitti ch
              INNER JOIN vChittiGeography AS vCg ON ch.chittiId = vCg.chittiId
              INNER JOIN vGeography AS vg ON vg.geographycode = vCg.Geography
              INNER JOIN colorinfo AS cli ON cli.id = ch.color_value
              LEFT JOIN (
                  SELECT chittiId, COUNT(id) AS likes
                  FROM chittilike
                  WHERE isLiked = 'true'
                  GROUP BY chittiId
              ) cl ON ch.chittiId = cl.chittiId
              LEFT JOIN (
                  SELECT chittiId, COUNT(id) AS comment
                  FROM chitticomment
                  GROUP BY chittiId
              ) chc ON ch.chittiId = chc.chittiId
              LEFT JOIN (
                  SELECT chittiId, isLiked
                  FROM chittilike
                  WHERE subscriberId = ?
              ) cl2 ON ch.chittiId = cl2.chittiId
              WHERE ch.chittiId IN ($chittiList) AND ch.finalStatus = 'approved'
              GROUP BY ch.Title, ch.chittiId, ch.description, ch.languageId, ch.dateOfApprove
              ORDER BY STR_TO_DATE(ch.dateOfApprove, '%d-%m-%Y') DESC
              LIMIT ? OFFSET ?";
    $stmt = $dbconnect->prepare($query);
    $stmt->bind_param('sii', $subscriberId, $limit, $offset);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}
?>
