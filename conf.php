<?php

session_start();

set_time_limit(0);

error_reporting(E_ALL);

$_SESSION["id_sesiune"] = session_id();

if (!isset($_SESSION["id_utilizator"])){
    $_SESSION["id_utilizator"] = "";
}

if (!isset($_SESSION["nume_utilizator"])){
    $_SESSION["nume_utilizator"] = "";
}

if (!isset($_SESSION["rol_utilizator"])){
    $_SESSION["rol_utilizator"] = "";
}

if (!isset($_SESSION["prenume_nume"])){
    $_SESSION["prenume_nume"] = "";
}

$Roluri = array(1, 2, 3);

$Server = "localhost";
$DbName = "catalogscolar";
$dsn = "mysql:host=$Server; dbname=$DbName; charset=UTF8";
$UserDB = "admin";
$PwdDB = "1323gaye";
$Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {

    $conection = new PDO($dsn, $UserDB, $PwdDB, $Options);

} catch (PDOException $e){

    die("Erroare! Nu s-a putut  realiza conexiunea la baza de date.<br>" . $e ->getMessage());

}

?>