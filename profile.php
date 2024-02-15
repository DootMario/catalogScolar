<?php
file_exists(__DIR__."/conf.php") ?
    require_once __DIR__."/conf.php" :
    die("Fișierul de configurare nu a fost găsit!");

if (empty($_SESSION["nume_utilizator"]) || !in_array($_SESSION["rol_utilizator"], $Roluri)) {
    header("Location: deconectare.php");
    exit();
}

?>

    <html lang="ro">
    <head>
        <title>
            <?php echo $_SESSION["nume_utilizator"]; ?>
        </title>
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

    <div class="container bg-secondary-subtle m-auto mt-5 p-5 form">
        <h1 class="text-center">Profil</h1>
        <form method="post" action="" name="profile" class="needs-validation" novalidate>
            <fieldset>
                <div class="row">
                    <div class="col-12 p-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION["nume_utilizator"];?>">
                    </div>
                    <div class="col-6 p-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password1" name="password1" placeholder="New Password" autocomplete="off">
                        <div id="pash" class="form-text">
                            <span id="lm", class="bi bi-x-lg" style="color: #FF0004;"></span>
                            cel putin o litera mica
                            <span id="lM", class="bi bi-x-lg" style="color: #FF0004;"></span>
                            cel putin o litera mare
                            <span id="cif", class="bi bi-x-lg" style="color: #FF0004;"></span>
                            cel putin o cifra
                            <span id="cs", class="bi bi-x-lg" style="color: #FF0004;"></span>
                            cel putin un caracter special
                            <span id="lp", class="bi bi-x-lg" style="color: #FF0004;"></span>
                            cel putin 9 caractere
                            <span id="passP"></span>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <label for="password" class="form-label">Confirm</label>
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" autocomplete="off">
                        <div id="pash2" class="form-text">
                            <span id="cp", class="bi bi-x-lg" style="color: #FF0004;"></span>
                            parolele nu corespund
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        ID: <?php echo $_SESSION["id_utilizator"]?>
                    </div>
                    <div class="col-6 p-2">
                        Privilege: <?php echo $_SESSION["rol_utilizator"];?>
                    </div>
                </div>
            </fieldset>
            <button class="btn btn-primary mx-auto mt-2" type="submit">Update</button>
        </form>
    </div>
    </body>
    <script src="pass.js"></script>
    <script src="scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </html>

<?php

if (htmlspecialchars($_SERVER["REQUEST_METHOD"]) == "POST") {
    $nume_utilizator = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $parola = filter_input(INPUT_POST, "password1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!empty($nume_utilizator) || !empty($parola)) {
        try {
            $id = $_SESSION["id_utilizator"];
            $sql = "UPDATE utilizatori SET nume_utilizator = :nume_utilizator , parola = :parola WHERE utilizatori.id_utilizator = $id;";
            if (isset($conection)) {
                $cerereSQL = $conection->prepare($sql);
            }

            if ($cerereSQL->execute(array(":nume_utilizator" => $nume_utilizator, ":parola" => md5($parola)))) {
                //probably need some pass valid cus, buuuut not rn
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Date de logare updatate cu success!<br/>'.'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                header("location: deconectare.php");
            }
        }
        catch (PDOException $e) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Eroare! Faulty sql request! Try again later!<br/>' . $e->getMessage() . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            exit();
        }
    }
    else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Nu ați introdus date ce trebuie schimbate!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}
$conection = null;
?>