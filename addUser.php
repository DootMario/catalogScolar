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
        New
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
    <h1 class="text-center">Adaugare Utilizator</h1>
    <form method="post" action="" name="profile" class="needs-validation" novalidate>
        <fieldset>
            <div class="row">
                <div class="col-6 p-2">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="New User">
                </div>
                <div class="col-6 p-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="col-6 p-2">
                    <label for="password" class="form-label">Privilege</label>
                    <input type="number" class="form-control" id="priv" name="priv" placeholder="Level" min="1" max="3">
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
    $rol = filter_input(INPUT_POST, "priv", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ((!empty($nume_utilizator) && !empty($parola)) && !empty($rol)) {
        try {
            $sql = "INSERT INTO utilizatori (nume_utilizator, parola, rol_utilizator) VALUES (:nume_utilizator, :parola, :rol_utilizator);";
            if (isset($conection)) {
                $cerereSQL = $conection->prepare($sql);
            }

            if ($cerereSQL->execute(array(":nume_utilizator" => $nume_utilizator, ":parola" => md5($parola), ":rol_utilizator"=>$rol))) {
                //probably here would be a fuck ton more code to fill the other user tables based on username and on what role the user has
                //but we got no info or pointers on how we would wanna do that and if i went too far into that doing it my way (scuffed as all hell) id be wasting time
                //trying to make it be on point with what the class wants an what the actual expected behaviour of the app is
                //in short im too lazy and also too scared to work more on this cus i might have to redo all of it and recicle a lot of code
                header("refresh:0");
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Utilizator adaugat cu success!<br/>'.'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        }
        catch (PDOException $e) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Eroare! Faulty sql request! Try again later!<br/>' . $e->getMessage() . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            exit();
        }
    }
    else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Nu ați introdus date necesare pt creearea unui nou cont de utilizator!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}
$conection = null;
?>
