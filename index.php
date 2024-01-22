<?php
file_exists(__DIR__ . "/conf.php") ?
    require_once __DIR__ . "/conf.php" :
    die("Fișierul de configurare nu a fost găsit!");

if (empty($_SESSION["nume_utilizator"]) || !in_array($_SESSION["rol_utilizator"], $Roluri)) {
    header("Location: /deconectare.php");
    exit();
}