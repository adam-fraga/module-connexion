<?php
include 'config/db.php';
include 'config/functions.php';
session_start();

//Requete
$userquery = "SELECT * FROM `utilisateurs` WHERE 1";
//Execution requête
$query = mysqli_query($connexion, $userquery);

//Recup tout les  tableaux ASSOC
$identifiants = mysqli_fetch_all($query, MYSQLI_ASSOC);
foreach ($identifiants as $value)
//    VERIF SI ACTION DE CONNEXION
    if (isset($_POST['connexion'])) {
//Parcourt tout les tableaux DB ET VERIF SI = LOGIN + PASS DE FORM
        foreach ($identifiants as $value) {
            if ($value['login'] == $_POST['login'] && $value['password'] == $_POST['pass']) {
//REDIRIGER USER VERS PAGE MODIF PROFIL
                $_POST = $_SESSION['user'];
                header("location: profil.php");
            }
        }
    }
//    SI LE TEMPS CREER UN FICHIER DE GESTION DES MESSAGES D'ERREUR ET L'INCLUDE ET VOIR POUR FONCTIONS

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
//include("header.php")
?>
<main>
    <!--Formulaire de connexion-->
    <article class="article cadre">
        <h2 class="title">Formulaire de connexion</h2>
        <p class="para">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad atque commodi cum debitis
            exercitationem facere,
            fugiat iusto laboriosam laudantium maxime molestias natus nihil nobis officiis quis, quos velit voluptate
            voluptatibus?</p>
    </article>
    5
    <form action="connexion.php" method="post" class=" form-connexion col">
        <label for="login">Login</label>
        <input type="text" id="login" name="login" placeholder="Login">
        <label for="pass">Password</label>
        <input type="password" id="pass" name="pass" placeholder="Password">
        <button type="submit" name="connexion" class="btn">GO</button>

    </form>

</main>

<!--INCLUSION FOOTER-->
<?php
include("footer.php")
?>
</body>
</html>
