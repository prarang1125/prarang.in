<?php

header('Content-type: application/json');
include "include/connect.php";

@$tagId = BlockSQLInjection($_REQUEST['tagId']);
@$subscriberId = BlockSQLInjection($_REQUEST['subscriberId']);
@$offset = BlockSQLInjection($_REQUEST['offset']);
$languageCode = BlockSQLInjection($_REQUEST['languageCode']);
@$geographyCode = BlockSQLInjection($_REQUEST['geographyCode']);

switch ($geographyCode) {
    case "c2":
        $areaId = 2;
        $geographyId = 2;
        break;
    case "c3":
        $areaId = 3;
        $geographyId = 2;
        break;
    case "c4":
        $areaId = 4;
        $geographyId = 2;
        break;
    case "r4":
        $areaId = 4;
        $geographyId = 3;
        break;
    case "0":
        $areaId = 0;
        $geographyId = 0;
        break;
    default:
        $areaId = 2;
        $geographyId = 2;
        break;
}

if ($tagId == '') {
    $code = ['responseCode' => '0', 'message' => 'String not Found'];
    echo json_encode($code);
    exit;
}

$sqlChittiList = mysqli_query($dbconnect, "SELECT DISTINCT cm.chittiId
    FROM chittitagmapping cm
    INNER JOIN chittigeographymapping cg ON cm.chittiId = cg.chittiId
    WHERE cm.tagId = '$tagId'
    AND cg.areaId = '$areaId'
    AND cg.geographyId = '$geographyId'");

$chittiIdList = [];
if ($sqlChittiList) {
    while ($displayChittiList = mysqli_fetch_array($sqlChittiList)) {
        $chittiIdList[] = $displayChittiList['chittiId'];
    }
    $chittiList = implode(',', $chittiIdList);
} else {
    $chittiList = '';
}

$queryCondition = $offset < 1
    ? "ORDER BY ch.dateOfApprove DESC LIMIT 10"
    : "AND ch.chittiId > $offset ORDER BY ch.dateOfApprove ASC LIMIT 10";

$sql = "SELECT ch.Title, ch.chittiId, ch.SubTitle, cg.geographyId, ch.description,
               ch.languageId, ch.dateOfApprove, IFNULL(cl.isLiked, 0) AS totalLike,
               IFNULL(cl.isLiked, 0) AS totalComment, ch.color_value, cl.isLiked
        FROM chitti ch
        INNER JOIN chittigeographymapping cg ON ch.chittiId = cg.chittiId
        LEFT JOIN chittilike cl ON ch.chittiId = cl.chittiId
        WHERE ch.chittiId IN ($chittiList) $queryCondition";

$result = mysqli_query($dbconnect, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $json = [
        "responseCode" => "1",
        "message" => "Success",
        "subscriberId" => $subscriberId,
        "Payload" => []
    ];

    while ($obj = mysqli_fetch_assoc($result)) {
        $chitti = [
            "Title" => $obj["Title"],
            "chittiId" => $obj["chittiId"],
            "SubTitle" => $obj["SubTitle"],
            "geography" => $obj["geographyId"],
            "description" => $obj["description"],
            "dateOfApprove" => $obj["dateOfApprove"],
            "totalLike" => $obj["totalLike"],
            "totalComment" => $obj["totalComment"],
            "colorcode" => $obj["color_value"],
            "isLiked" => $obj["isLiked"]
        ];
        array_push($json["Payload"], $chitti);
    }
    echo json_encode($json, JSON_UNESCAPED_UNICODE);
} else {
    $message = $languageCode === 'hi'
        ? 'माफ़ करे पत्र उपलब्ध नही है, दूसरा भुगोल चुने।'
        : 'Sorry, no letters here. Pick another geography!';
    $code = ['responseCode' => '0', 'message' => $message];
    echo json_encode($code);
}

mysqli_close($dbconnect);

?>
<?php

header('Content-type: application/json');
include "include/connect.php";

@$tagId = BlockSQLInjection($_REQUEST['tagId']);
@$subscriberId = BlockSQLInjection($_REQUEST['subscriberId']);
@$offset = BlockSQLInjection($_REQUEST['offset']);
$languageCode = BlockSQLInjection($_REQUEST['languageCode']);
@$geographyCode = BlockSQLInjection($_REQUEST['geographyCode']);

switch ($geographyCode) {
    case "c2":
        $areaId = 2;
        $geographyId = 2;
        break;
    case "c3":
        $areaId = 3;
        $geographyId = 2;
        break;
    case "c4":
        $areaId = 4;
        $geographyId = 2;
        break;
    case "r4":
        $areaId = 4;
        $geographyId = 3;
        break;
    case "0":
        $areaId = 0;
        $geographyId = 0;
        break;
}

if ($tagId == '') {
    $code = ['responseCode' => '0', 'message' => 'String not Found'];
    echo json_encode($code);
    exit;
}

$sqlChittiList = mysqli_query($dbconnect, "SELECT DISTINCT cm.chittiId
    FROM chittitagmapping cm
    INNER JOIN chittigeographymapping cg ON cm.chittiId = cg.chittiId
    WHERE cm.tagId = '$tagId'
    AND cg.areaId = '$areaId'
    AND cg.geographyId = '$geographyId'
    COLLATE utf8mb4_unicode_ci");

$chittiIdList = [];
if ($sqlChittiList) {
    while ($displayChittiList = mysqli_fetch_array($sqlChittiList)) {
        $chittiIdList[] = $displayChittiList['chittiId'];
    }
    $chittiList = implode(',', $chittiIdList);
} else {
    $chittiList = '';
}

$queryCondition = $offset < 1
    ? "ORDER BY ch.dateOfApprove DESC LIMIT 10"
    : "AND ch.chittiId > $offset ORDER BY ch.dateOfApprove ASC LIMIT 10";

$sql = "SELECT ch.Title, ch.chittiId, ch.SubTitle, cg.geography, ch.description,
               ch.languageId, ch.dateOfApprove, IFNULL(cl.likes, 0) AS totalLike,
               IFNULL(cl.comments, 0) AS totalComment, ch.colorcode, ch.isLiked
        FROM chittimaster ch
        INNER JOIN chittigeographymapping cg ON ch.chittiId = cg.chittiId
        LEFT JOIN chittilike cl ON ch.chittiId = cl.chittiId
        WHERE ch.chittiId IN ($chittiList) $queryCondition
        COLLATE utf8mb4_unicode_ci";

$result = mysqli_query($dbconnect, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $json = [
        "responseCode" => "1",
        "message" => "Success",
        "subscriberId" => $subscriberId,
        "Payload" => []
    ];

    while ($obj = mysqli_fetch_assoc($result)) {
        $chitti = [
            "Title" => $obj["Title"],
            "chittiId" => $obj["chittiId"],
            "SubTitle" => $obj["SubTitle"],
            "geography" => $obj["geography"],
            "description" => $obj["description"],
            "dateOfApprove" => $obj["dateOfApprove"],
            "totalLike" => $obj["totalLike"],
            "totalComment" => $obj["totalComment"],
            "colorcode" => $obj["colorcode"],
            "isLiked" => $obj["isLiked"]
        ];
        array_push($json["Payload"], $chitti);
    }
    echo json_encode($json, JSON_UNESCAPED_UNICODE);
} else {
    $message = $languageCode === 'hi'
        ? 'माफ़ करे पत्र उपलब्ध नही है, दूसरा भुगोल चुने।'
        : 'Sorry, no letters here. Pick another geography!';
    $code = ['responseCode' => '0', 'message' => $message];
    echo json_encode($code);
}

mysqli_close($dbconnect);

?>

