<?php
require 'config/db.php';
session_start();
//Controle si admin
if ($_SESSION['user']['isadmin']  == true )
{

}
else {
    header("location:connexion.php");
    exit();
}
$request = "SELECT * FROM utilisateurs";
$query_users = mysqli_query($connexion, $request);
$users_tab = mysqli_fetch_all($query_users, MYSQLI_ASSOC);

?>

<!--MAIN HTML ACCUEIL-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/global.css">
    <link rel="stylesheet" href="style/admin.css">
    <title>Title</title>
</head>
<body>
<!--INCLUSION DU HEADER-->
<?php
require('header.php');
?>
<main>
    <div class="container">
        <article class="article cadre fix-top">
            <h2 class="title">Espace d'administration</h2>
            <p class="para">Bienvenue dans votre espace d'administration, ici l'administrateur du site peut modifier à
                sa guise les informations des utilisateurs présent dans la base de donnée.
            </p>
        </article>
        <table class="info-user">
            <tr>
                <th>Login</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Mot de passe</th>
            </tr>
            <?php foreach ($users_tab as $value) {
                echo "<tr><td>" . $value['login'] . "</td>" . "<td>" . $value['nom'] . "</td>" . "<td>" . $value['prenom'] . "</td>." . "<td>" . $value['password'] . "</td>" . "</tr>";
            } ?>


        </table>
    </div>
</main>
<?php
require_once('footer.php');
?>
</body>
</html>


