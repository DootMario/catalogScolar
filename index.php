<?php
file_exists(__DIR__."/conf.php") ?
    require_once __DIR__."/conf.php" :
    die("Fișierul de configurare nu a fost găsit!");

if (empty($_SESSION["nume_utilizator"]) || !in_array($_SESSION["rol_utilizator"], $Roluri)) {
    header("Location: /deconectare.php");
    exit();
}

?>

<html lang="ro">

    <head>
        <title>Home</title>
        <?php
        file_exists(__DIR__ . "/modules/header.php") ?
            require_once __DIR__ . "/modules/header.php" :
            die("Fișierul header nu a fost găsit!");
        ?>
    </head>

    <body data-bs-theme="dark">

        <?php
        file_exists(__DIR__ . "/modules/menu.php") ?
            require_once __DIR__ . "/modules/menu.php" :
            die("Fișierul menu nu a fost găsit!");
        ?>

    </body>

    <script src="scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
