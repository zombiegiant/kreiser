<?php
session_start();

const dbName = "card";
const dbHost = "localhost";
const dbUserName = "user";
const dbPassword = "[frfnjy2020";

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);




function ConnectDB(){

    $mysqli=new mysqli(dbHost, dbUserName, dbPassword, dbName);
    mysqli_query ($mysqli,"set_client='utf8'");
    mysqli_query ($mysqli,"set character_set_results='utf8'");
    mysqli_query ($mysqli,"set collation_connection='utf8_general_ci'");
    mysqli_query ($mysqli,"SET NAMES utf8");
    return $mysqli;
}




if(isset($_POST['logout'])) logout();

function logout(){
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
}

function send($host, $port, $login, $password, $phone, $text, $sender = false, $wapurl = false )
{
    $fp = fsockopen($host, $port, $errno, $errstr);
    if (!$fp) {
        return "errno: $errno \nerrstr: $errstr\n";
    }
    fwrite($fp, "GET /messages/v2/send/" .
        "?phone=" . rawurlencode($phone) .
        "&text=" . rawurlencode($text) .
        ($sender ? "&sender=" . rawurlencode($sender) : "") .
        ($wapurl ? "&wapurl=" . rawurlencode($wapurl) : "") .
        "  HTTP/1.0\n");
    fwrite($fp, "Host: " . $host . "\r\n");
    if ($login != "") {
        fwrite($fp, "Authorization: Basic " .
            base64_encode($login. ":" . $password) . "\n");
    }
    fwrite($fp, "\n");
    $response = "";
    while(!feof($fp)) {
        $response .= fread($fp, 1);
    }
    fclose($fp);
    list($other, $responseBody) = explode("\r\n\r\n", $response, 2);
    return $responseBody;
}