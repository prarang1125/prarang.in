<?php
function isValidToken($token)
{
    return true;
    if (empty($token)) {
        return false;
    }
    $valid_tokens = array("PRARANGPROV1", "PRARANGPRPOV2", "PRARANGPROX");
    if (in_array($token, $valid_tokens)) {
        return true;
    } else {
        return false;
    }
}

function method($method)
{
    if ($_SERVER['REQUEST_METHOD'] == $method) {
        return true;
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Method Not Allow"));
        exit();
    }
}

function response($data = null, $code)
{
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit();
}

function getData($var)
{
    global $conn;
    if (isset($_GET[$var])) {
        return mysqli_real_escape_string($conn, $_GET[$var]);
    } else {
        return null;
        // echo json_encode(['message' => $var . " Not Defined"]);
        // exit();
    }
}

function postData($var)
{
    global $conn;
    if (isset($_POST[$var])) {
        return mysqli_real_escape_string($conn, $_POST[$var]);
    } else {
        return null;
        // echo json_encode(['message' => $var . " Not Defined"]);
        // exit();
    }
}

function testVar($var)
{
    if (is_array($var)) {
        var_dump($var);
        // print_r($var);
        // echo '<pre>';
    } else {
        // echo $var;
        var_dump($var);
    }
    die();
}
