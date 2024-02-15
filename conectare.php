<?php

file_exists(__DIR__."/conf.php")?
    require_once __DIR__."/conf.php":
    die("Fisierul de configurare nu a fost gasit.");

?>
    <html lang="ro">
    <head>
        <title>Conectare</title>
        <?php
        file_exists(__DIR__ . "/modules/header.php") ?
            require_once __DIR__ . "/modules/header.php" :
            die("Fișierul header nu a fost găsit!");
        ?>
    </head>
    <body data-bs-theme="dark">
    <div class="container bg-secondary-subtle my-4 p-4 form">
        <h1 class="text-center">Login</h1>
        <form method="post" action="" name="login" class="needs-validation" novalidate>
            <fieldset>
                <div class="row">
                    <div class="col-12 m-2 p-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="col-12 m-2 p-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
            </fieldset>
            <button class="btn btn-primary m-2" type="submit">Login</button>
        </form>
        <div id="mesaj" class="mt-3"></div>
        <script>
            function afisareMesaj() {
                let mesaj = document.getElementById('mesaj');
                mesaj.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Datele de autentificare sunt incorecte!<br>Încercați o nouă conectare sau contactați administratorul.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

            }
        </script>
    </div>
    <script src="scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>

    </html>

<?php

if (htmlspecialchars($_SERVER["REQUEST_METHOD"]) == "POST") {
    $nume_utilizator = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $parola = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!empty($nume_utilizator) && !empty($parola)) {
        try {
            $sql = "SELECT id_utilizator, rol_utilizator FROM utilizatori WHERE nume_utilizator = :nume_utilizator AND parola = :parola";
            if (isset($conection)) {
                $cerereSQL = $conection->prepare($sql);
            }

            if ($cerereSQL->execute(array(":nume_utilizator" => $nume_utilizator, ":parola" => md5($parola)))) {
                $rand = $cerereSQL->fetch(PDO::FETCH_ASSOC);

                if ($cerereSQL->rowCount() == 1) {
                    $_SESSION["id_utilizator"] = $rand["id_utilizator"];
                    $_SESSION["nume_utilizator"] = $nume_utilizator;
                    $_SESSION["rol_utilizator"] = $rand["rol_utilizator"];
                    header("location: index.php");
                }
                else {
                    echo '<script> afisareMesaj(); </script>';
                }
            }
        }
        catch (PDOException $e) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Eroare! Nu s-a putut realiza conectarea utilizatorului.<br/>' . $e->getMessage() . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            exit();
        }
    }
    else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Nu ați introdus date de conectare!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}
$conection = null;
?>