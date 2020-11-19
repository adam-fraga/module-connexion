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
require_once('header.php');
?>
<main>
    <div class="container">
        <article class="article cadre fix-top">
            <h2 class="title">Information utilisateurs</h2>

            <p class="para">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias, aliquam beatae
                commodi consequuntur delectus eius eligendi, esse fuga hic illum impedit ipsam molestiae molestias
                obcaecati, placeat possimus quos repellendus.</p>
        </article>
        <table class="info-user">
            <tr>
                <th>Login</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Mot de passe</th>
            </tr>
            <tr>
                <td>Login</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Email</td>
                <td>Mot de passe</td>
            </tr><tr>
                <td>Login</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Email</td>
                <td>Mot de passe</td>
            </tr><tr>
                <td>Login</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Email</td>
                <td>Mot de passe</td>
            </tr>

        </table>
    </div>
</main>
<?php
require_once('footer.php');
?>
</body>
</html>


