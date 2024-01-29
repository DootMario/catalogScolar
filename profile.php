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
            <form method="post" action="" name="profile" class="needs-validation" novalidate>c
                <fieldset>
                    <div class="row">
                        <div class="col-6 p-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $_SESSION["nume_utilizator"];?>">
                        </div>
                        <div class="col-6 p-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
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
    <script src="scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>

<?php

if (htmlspecialchars($_SERVER["REQUEST_METHOD"]) == "POST") {
    $nume_utilizator = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $parola = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!empty($nume_utilizator) || !empty($parola)) {
        try {
            $id = $_SESSION["id_utilizator"];
            $sql = "UPDATE utilizatori SET nume_utilizator = :nume_utilizator , parola = :parola WHERE utilizatori.id_utilizator = $id;";
            if (isset($conection)) {
                $cerereSQL = $conection->prepare($sql);
            }

            if ($cerereSQL->execute(array(":nume_utilizator" => $nume_utilizator, ":parola" => md5($parola)))) {
                //have to change the session variables in order for the page to update but that means another query inside of this and im too lazy to do it rn
                header("refresh:0");
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Date de logare updatate cu success!<br/>'.'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                //probably could put it to sleep for like 5 secs and display a timer then kill the session and promt relogin but ehh
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
