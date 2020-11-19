
<!--Le formulaire doit contenir l’ensemble des champs présents dans la table-->
<!--“utilisateurs” (sauf “id”) + une confirmation de mot de passe. Dès qu’un-->
<!--utilisateur remplit ce formulaire, les données sont insérées dans la base de-->
<!--données et l’utilisateur est redirigé vers la page de connexion.-->
<?php
//Connection DB
$host = "localhost";
$login = "root";
$password = "";
$connexion = mysqli_connect($host, $login, $password, "moduleconnexion");

//TEST CONNEXION
if (!$connexion) {
echo "Error";
    die("Error\:".mysqli_connect_error() );
}
