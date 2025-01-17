<?php
include_once 'config/dbcon.php'; // global Variable $conn;
include_once 'config/functions.php'; //All functions

header("Access-Control-Allow-Origin: *"); //prevent CROS Origin Accrss
header("Content-Type: application/json; charset=UTF-8");
//  Route and Token Validations
if (isset($_GET['endpoint'])) {
    $endpoint = getData('endpoint');
    $token = $_SERVER['AUTH_TOKEN'];
    if (!isValidToken($token)) {
        http_response_code(401);
        echo json_encode(array("message" => "Invalid token"));
        exit();
    }
} else {
    http_response_code(503);
    echo '{"error":"Service unavailable"}';
    exit();
}
// Route array
include_once 'routes.php';

$routeFound = false; // Route Status 
// Matching all routes
foreach ($routes as $route) {
    if ($endpoint == $route[0]) {
        method($route[2]);
        include_once 'apis/' . $route[1] . '.php';
        $routeFound = true;
    }
}

if (!$routeFound) {
    http_response_code(404);
    echo json_encode(array("message" => "Not Found!"));
    exit();
}
