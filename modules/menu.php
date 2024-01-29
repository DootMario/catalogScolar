<?php

file_exists(__DIR__."/../conf.php")?
    require_once __DIR__."/../conf.php":
    die("Fisierul de configurare nu a fost gasit.");

if (empty($_SESSION["nume_utilizator"]) || !in_array($_SESSION["rol_utilizator"], $Roluri)) {
    header("Location: /deconectare.php");
    exit();
}
?>

<html lang="ro">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catalog
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Elevi</a></li>
                            <li><a class="dropdown-item" href="#">Profesori</a></li>
                            <li><a class="dropdown-item" href="#">Secretari</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Setari
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Scoala</a></li>
                            <li><a class="dropdown-item" href="#">Utilizatori</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Operatii
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/addUser.php">Adauga Utilizator</a></li>
                            <li><a class="dropdown-item" href="#">Am uitat</a></li>
                            <li><a class="dropdown-item" href="#">Nu mai stiu</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                                echo "Bine ai venit ".$_SESSION["nume_utilizator"];
                            ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/profile.php">Profil</a></li>
                            <li><a class="dropdown-item" href="/deconectare.php">Deconecteaza-te</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</html>
