<?php
include 'config/db.php';
session_start();
$id_KO = false;
//Requete
$userquery = "SELECT * FROM `utilisateurs` WHERE 1";
//Execution requête
$query = mysqli_query($connexion, $userquery);

//Recup tout les  tableaux ASSOC
$identifiants = mysqli_fetch_all($query, MYSQLI_ASSOC);


//    VERIF SI ACTION DE CONNEXION
if (isset($_POST['connexion'])) {

    //Parcourt tout les tableaux DB ET VERIF SI = LOGIN + PASS DE FORM
    foreach ($identifiants as $value) {
        if (htmlspecialchars($_POST['login']) != "admin" && $value['login'] == htmlspecialchars($_POST['login']) && $value['password'] == htmlspecialchars($_POST['pass']) && htmlspecialchars($_POST['pass']) != "admin" && htmlspecialchars($_POST['login']) != "admin") {
            //Si user present dans la DB et different de Admin REDIRIGER USER VERS PAGE MODIF PROFIL
            $_SESSION['user'] = $_POST;
            $_SESSION['user']['isadmin'] = false;
            $_SESSION['user']['isconnect'] = true;
            header("location: profil.php");
            //                Si user admin alors redirige vers page administration
        } elseif (htmlspecialchars($_POST['login']) == "admin" && htmlspecialchars($_POST['pass']) == "admin") {
            $_SESSION['user'] = $_POST;
            $_SESSION['user']['isadmin'] = true;
            $_SESSION['user']['isconnect'] = true;
            header("location: admin.php");
        } else {
            $id_KO = true;
        }
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/global.css">
    <link rel="stylesheet" href="style/connexion.css">
    <title>Document</title>
</head>
<body>
<!--INCLUSION HEADER-->
<?php
include("header.php")
?>
<main>
    <!--Formulaire de connexion-->
    <article class="article cadre">
        <h2 class="title">Formulaire de connexion</h2>
        <p class="para">Connecte toi en utilisant ton Login et ton mot de passe!</p>
    </article>

    <form action="connexion.php" method="post" class="form-connexion col">
        <label for="login">Login</label>
        <input type="text" id="login" name="login" required placeholder="Login">
        <label for="pass">Password</label>
        <input type="password" id="pass" name="pass" required placeholder="Password">
        <button type="submit" name="connexion" class="btn">GO</button>
        <?php
        if ($id_KO = true) {
            echo '<p class="id_error">' . "Tes identifiants sont incorrects!" . '</p>';
        }
        ?>
    </form>

</main>

<!--INCLUSION FOOTER-->
<?php
include("footer.php")
?>
</body>
</html>
