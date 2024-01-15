<?php

session_start();

set_time_limit(0);

error_reporting(E_ALL);

$_SESSION["id_sesiune"] = session_id();

if (!isset($_SESSION["IDUtilizator"])){
    $_SESSION["IDUtilizator"] = "";
}

if (!isset($_SESSION["rol"])){
    $_SESSION["rol"] = "";
}

if (!isset($_SESSION["user"])){
    $_SESSION["user"] = "";
}

if (!isset($_SESSION["prenume_nume"])){
    $_SESSION["prenume_nume"] = "";
}

$Server = "localhost";
$DbName = "catalogscolar";
$dsn = "mysql:host=$Server; dbname=$DbName; charset=UTF8";
$UserDB = "user_admin";
$PwdDB = "1323gaye";
$Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {

    $conetion = new PDO($dsn, $UserDB, $PwdDB, $Options);

} catch (PDOException $e){

    die("Erroare! Nu s-a putut  realiza conexiunea la baza de date.<br>" . $e ->getMessage());

}

?>