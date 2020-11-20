<?php
include 'config/db.php';
session_start();
$target_user = false;

if (isset($_POST['submit'])) {
//INITIALISE REQUETE RECUP INFO FROM DB
    $request = "SELECT * FROM utilisateurs WHERE 1";


//Execute requete recup info from DB
    $query = mysqli_query($connexion, $request);

//RECUP DATA FROM DB
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);


//Verif log SESSION USER VRAI OU FAUX
    foreach ($_SESSION as $user) {
        foreach ($data as $value) {
            if ($user['login'] == $value['login'] && $user['pass'] == $value['password']) {
                $target_user = true;
                $info_user = $value;
            }
        }
    }
//Initialisation des variable saisit dans le formulairer
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $pass = $_POST['pass'];
    $login = $_POST['login'];

    //Recup login utilisateur pour identifier le champs à modifier dans DB
    $user_login = $info_user['login'];


//SI USER INFO CORRECT
    if ($target_user == true) {

        // Envoi de la requete de modif des infos en DB
        $query_change = "UPDATE utilisateurs SET prenom='$fname',nom='$name',password='$pass',login='$login' WHERE login='$user_login' ";
        $query_ok = mysqli_query($connexion, $query_change);

//        SI requête ok changement des identifiants dans variable de SESSION pour l'utilisateur
        if ($query_ok) {
            $_SESSION['user']['login'] = $_POST['login'];
            $_SESSION['user']['pass'] = $_POST['pass'];
        }
    }
}


echo "SESSION";
echo "<pre>";
print_r($_SESSION);
echo "/<pre>";

echo "<br>";
echo "<br>";

echo "DATA";
echo "<pre>";
print_r($data);
echo "/<pre>";

echo "<br>";
echo "<br>";

echo "<pre>";
echo "VALUE";
print_r($value);
echo "/<pre>";


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
//require_once('header.php');
?>
<!--PAGE INSCRIPTION-->
<div class="container">
    <section class="edit-profil">
        <!--        PRESENTATION-->
        <div class="pres-edit-profil cadre">
            <h2 class="title"> Modifier mes informations</h2>

            <p class="para">Bienvenue dans le section de modifications de tes informations afin de changer de nom et
                de
                prénom il te sera bien entendu demandé de saisir ton login et ton mot de passe, Si tu as oublier ton
                login et ton mot de passe tu peux toujours les modifier en cliquant sur ce lien
                <a href="password.php">Mot de passe oublié</a>.</p>
        </div>
        <!--FORMULAIRE-->
        <form action="profil.php" METHOD="post" class="form-edit-profil cadre col">
            <label for="name">Nouveau NOM</label>
            <input type="text" id="name" name="name" required value="">
            <label for="fname">Nouveau PRENOM</label>
            <input type="text" id="fname" name="fname" required value="">
            <label for="login">Nouveau LOGIN</label>
            <input type="text" id="login" name="login" required value="">
            <label for="pass">Nouveau PASSWORD</label>
            <input type="password" id="pass" name="pass" required value="">

            <button type="submit" name="submit" class="btn ">Change</button>
        </form>
    </section>
</div>
<!--INCLUSION FOOTER-->
<?php
require_once('footer.php');
?>
</body>
</html>


