<?php
header('Content-Type: text/html; charset=utf-8');
const dbName = "card";
const dbHost = "localhost";
const dbUserName = "user";
const dbPassword = "[frfnjy2020";

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

header('Content-Type: text/html; charset=utf-8');


function ConnectDB(){

    $mysqli=new mysqli(dbHost, dbUserName, dbPassword, dbName);
    mysqli_query ($mysqli,"set_client='utf8'");
    mysqli_query ($mysqli,"set character_set_results='utf8'");
    mysqli_query ($mysqli,"set collation_connection='utf8_general_ci'");
    mysqli_query ($mysqli,"SET NAMES utf8");
    return $mysqli;

}
echo "авы";
$mysqli=ConnectDB();
$pass = password_hash ( "qwe",PASSWORD_DEFAULT);

if (!$res=$mysqli->query("CALL Register('asd','иван','Иванович','+78123123','Карла Либнехта','3718 000000','1','ivan','$pass')")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
} else echo "Регистрация прошла успешно";