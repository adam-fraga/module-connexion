<?php
include 'config/db.php';
session_start();
if (!$_SESSION['admin'] || !$_SESSION['user'])
{
    header("location:connexion.php");
    exit();
}
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
    $name = htmlspecialchars($_POST['name']);
    $fname = htmlspecialchars($_POST['fname']);
    $pass = htmlspecialchars($_POST['pass']);
    $login = htmlspecialchars($_POST['login']);

    //Recup login utilisateur pour identifier le champs à modifier dans DB
    $user_login = $info_user['login'];


//SI USER INFO CORRECT
    if ($target_user == true) {

        // Envoi de la requete de modif des infos en DB
        $query_change = "UPDATE utilisateurs SET prenom='$fname',nom='$name',password='$pass',login='$login' WHERE login='$user_login' ";
        $query_ok = mysqli_query($connexion, $query_change);

//        SI requête ok changement des identifiants dans variable de SESSION pour l'utilisateur
        if ($query_ok) {
            $_SESSION['user']['login'] = htmlspecialchars($_POST['login']);
            $_SESSION['user']['pass'] = htmlspecialchars($_POST['pass']);
        }
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

            <p class="para">Bienvenue dans le section de modifications de tes informations.
                ici tu peux changer toutes tes informations en un clin d'oeil. Attention toutefois à ne pas te tromper dans
            la saisit des dites informations c'est du one shot!</p>
        </div>
        <!--FORMULAIRE-->
        <form action="profil.php" METHOD="post" class="form-edit-profil cadre col">
            <label for="name">Nouveau NOM</label>
            <input type="text" id="name" name="name" required value="<?php if (!empty($_SESSION)) {echo $info_user['nom'];}?>">
            <label for="fname">Nouveau PRENOM</label>
            <input type="text" id="fname" name="fname" required value="<?php if (!empty($_SESSION)) {echo $info_user['prenom'];}?>">
            <label for="login">Nouveau LOGIN</label>
            <input type="text" id="login" name="login" required value="<?php if (!empty($_SESSION)) {echo $info_user['login'];}?>">
            <label for="pass">Nouveau PASSWORD</label>
            <input type="password" id="pass" name="pass" required value="<?php if (!empty($_SESSION)) {echo $info_user['password'];}?>">

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


