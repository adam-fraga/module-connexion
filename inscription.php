<?php
require 'config/db.php';
//Initialisation session
session_start();



//VERIF CONDITION FORMULAIRE INSCRIPTION ET

if (isset($_POST["valid_inscription"])) {
    if (!empty($_POST['name']) && !empty($_POST['fname']) && !empty($_POST['login']) && !empty($_POST['pass']) && $_POST['pass'] == $_POST['confpass']) {
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $login = $_POST['login'];
        $pass = $_POST['pass'];

        //        CREATION VARIABLE DE REQUETE
        $request = "INSERT INTO utilisateurs (nom, prenom, login, password) VALUES ('$name', '$fname', '$login', '$pass')";

        $query = mysqli_query($connexion, $request);

        //REDIRIGE SUR LA PAGE CONNEXION.PHP
        header("location: connexion.php");

    }
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="style/header-footer.css"/>
    <link rel="stylesheet" href="style/global.css">
    <link rel="stylesheet" href="style/inscription.css">

    <title>Document</title>
</head>
<body>
<!--INCLUSION HEADER-->
<?php
//require_once('header.php');
?>
<!--PAGE INSCRIPTION-->
<div class="container">
    <section class="inscription">
        <!--        PRESENTATION-->
        <div class="pres-inscrip cadre">
            <h2 class="title"> Formulaire d'inscription</h2>

            <p class="para">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias, aliquam beatae
                commodi consequuntur delectus eius eligendi, esse fuga hic illum impedit ipsam molestiae molestias
                obcaecati, placeat possimus quos repellendus.</p>
        </div>
        <!--FORMULAIRE-->
        <form action="inscription.php" METHOD="post" class="form-inscription cadre col">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" placeholder="Fname" maxlength="25" required>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Name" maxlength="25" required>
            <label for="login">Login</label>
            <input type="text" id="login" name="login" placeholder="Login" required>
            <label for="pass">Password</label>
            <input type="password" id="pass" name="pass" placeholder="Password" required>
            <label for="confpass">Confirm Password</label>
            <input type="password" id="confpass" name="confpass" placeholder="Confirm your password" required>

            <button type="submit" name="valid_inscription" class="btn ">GO</button>
        </form>
    </section>
</div>
<!--INCLUSION FOOTER-->
<?php
require_once('footer.php');
?>
</body>
</html>


