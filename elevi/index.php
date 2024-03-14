<?php
file_exists(__DIR__."/../conf.php") ?
    require_once __DIR__."/../conf.php" :
    die("Fișierul de configurare nu a fost găsit!");

if (empty($_SESSION["nume_utilizator"]) || !in_array($_SESSION["rol_utilizator"], [1, 2])) {
    header("Location: /deconectare.php");
    exit();
}

?>



<html lang="ro_RO">
    <head>
        <title>Elevi</title>
        <?php
        file_exists(__DIR__ . "/../modules/header.php") ?
            require_once __DIR__ . "/../modules/header.php" :
            die("Fișierul header nu a fost găsit!");
        ?>
    </head>
    <?php
    file_exists(__DIR__ . "/../modules/menu.php") ?
        require_once __DIR__ . "/../modules/menu.php" :
        die("Fișierul menu nu a fost găsit!");
    ?>
    <body data-bs-theme="dark">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="class col-lg-12">
                    <div class="card">
                        <h2 class="card-header">Elevi</h2>
                        <div class="card-body">
<!--                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_adauga_utilizator">-->
<!--                                Adauga utilizator-->
<!--                            </button>-->
<!--                            sunt aporape sigur ca nu trb buton adauga utilizator pe paginile de utilizatori specializati-->
                            <a href="#" class="btn btn-primary" id="filtru_cauta">Filtru Cautare</a>
                            <h4 class="card-title mt-4">Tabel Elevi</h4>
                            <div id="mesaj">
                                <table class="table mt-3" id="tabelutilizatori">
                                    <thead>
                                        <tr class="table-success">
                                            <th style="display: none;">ID</th>
                                            <th>Nume</th>
                                            <th>Prenume</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Telefon</th>
                                            <th>Judet</th>
                                            <th>Localitate</th>
                                            <th>Adresa</th>
                                            <th>CNP</th>
                                            <th>Data Nasterii</th>
                                            <th>Data inregistrarii</th>
                                            <th class="text-center">Actiuni</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        try{
                                            $cerereSQL = $conection->query('SELECT * FROM elevi');
                                            while($rand = $cerereSQL->fetch(PDO::FETCH_ASSOC)){
                                                echo '
                                                                <tr>
                                                                    <td style="display:none;">'.$rand["id_user"].'</td>
                                                                    <td>'.$rand["nume"].'</td>
                                                                    <td>'.$rand["prenume"].'</td>
                                                                    <td>Username</td>
                                                                    <td>'.$rand["email"].'</td>
                                                                    <td>'.$rand["telefon"].'</td>
                                                                    <td>'.$rand["judet"].'</td>
                                                                    <td>'.$rand["localitate"].'</td>
                                                                    <td>'.$rand["adresa"].'</td>
                                                                    <td>'.$rand["CNP"].'</td>
                                                                    <td>'.$rand["data_nasterii"].'</td>
                                                                    <td class="text-center">
                                                                        <a id="'.$rand["id_user"].'" class="edit" title="Modifica" data-toggle="modal" data-target="#modalModificaUtilizator" style="font-size: 1.2em; color: SlateBlue;"><i class="bi bi-pencil-fill"></i></a>
                                                                        <a id="'.$rand["id_user"].'" class="delete" title="Sterge" style="font-size: 1.2em; color: Tomato;"><i class="bi bi-trash-fill"></i></a>
                                                                    </td>
                                                                </tr>
                                                            ';
                                            }
                                        }catch(PDOException $e){
                                            exit("Eroare la afisarea datelor din baza de date.<br/>".$e->getMessage()."<br/>");
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>