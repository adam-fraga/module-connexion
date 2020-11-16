
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
require_once('header.php');
?>
<!--PAGE INSCRIPTION-->
<div class="container">
    <section class="inscription">
<!--        PRESENTATION-->
        <h2 class="title"> Title</h2>

        <p class="l">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias, aliquam beatae
            commodi consequuntur delectus eius eligendi, esse fuga hic illum impedit ipsam molestiae molestias
            obcaecati, placeat possimus quos repellendus.</p>
<!--FORMULAIRE-->
    <h3 class="title">Formulaire d'inscription</h3>

    <form action="inscription.php" METHOD="post" class="form-inscription cadre col">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" placeholder="Fname"  >
        <label for="name">Name</label>
        <input type="text" id="name" name="name"  placeholder="Name">
        <label for="login">Login</label>
        <input type="text" id="login" name="login"  placeholder="Login">
        <label for="pass">Password</label>
        <input type="password" id="pass" name="pass" placeholder="Password">
        <label for="confpass">Confirm Password</label>
        <input type="password" id="confpass" name="confpass" placeholder="Confirm your password">

        <button type="submit" name="submit" class="btn ">GO</button>
    </form>
    </section>
</div>
<!--INCLUSION FOOTER-->
<?php
require_once('footer.php');
?>
</body>
</html>


