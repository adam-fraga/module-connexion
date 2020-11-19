<?php
session_start();


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
    <link rel="stylesheet" href="style/profil.css">

    <title>Document</title>
</head>
<body>
<!--INCLUSION HEADER-->
<?php
require_once('header.php');
?>
<!--PAGE INSCRIPTION-->
<div class="container">
    <section class="edit-profil">
        <!--        PRESENTATION-->
        <div class="pres-edit-profil cadre">
            <h2 class="title"> Modifier mes informations</h2>

            <p class="para">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias, aliquam beatae
                commodi consequuntur delectus eius eligendi, esse fuga hic illum impedit ipsam molestiae molestias
                obcaecati, placeat possimus quos repellendus.</p>
        </div>
        <!--FORMULAIRE-->
        <form action="profil.php" METHOD="post" class="form-edit-profil cadre col">
            <label for="login">Login</label>
            <input type="text" id="login" name="login" placeholder="Login">
            <label for="pass">New Password</label>
            <input type="password" id="pass" name="pass" placeholder="Password">
            <label for="confpass">Confirm new Password</label>
            <input type="password" id="confpass" name="confpass" placeholder="Confirm your password">

            <button type="submit" name="submit" class="btn ">Valider</button>
        </form>
    </section>
</div>
<!--INCLUSION FOOTER-->
<?php
require_once('footer.php');
?>
</body>
</html>


