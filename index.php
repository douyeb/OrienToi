<!DOCTYPE html>
<?php
// Cette page est notre page d'acceuil celle qui s'affiche en premier pour les utilisateurs non connectés
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
session_unset(); //premet de reset la variable $_SESSION de php ce qui nous permet de sécuriser le site
?>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>ProjetApp - Connexion</title>
    <link href="mainStyle.css" rel="stylesheet">

    <!--Manrope-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">

    <!--Baloo 2-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@800&display=swap" rel="stylesheet">
</head>
<!--changer toutes les polices en baloo et modifier la page pas encore de compte par ici, modifier la forme des boutons accueil et discussions-->
<body>

    <!--Front de page-->
    <header>
        <h1>Mily BIENVENUE !</h1>
        <div class = "droite"><a href="supprimer.php" class="button">Supprimer son compte</a></div>
        
    </header>

    <!--Page de connexion-->
    <main>
        <br/>
        <div>
            
        </div>
        <div class="container_index">
            <div class="connexion">
                <center>
                    <h2>Se connecter</h2>
                    <form method="post" action="connexion/login_check.php">
                        <label for="username">Nom d'utilisateur :</label>
                        <input type="text" id="username" name="username"><br>

                        <label for="password">Mot de passe :</label><br>
                        <input type="password" id="password" name="password"><br>

                        <input type="submit" value="Se connecter">
                        <br /><br />
                        <p>
                            Pas encore de compte ?<p></p>
                            <a href="register/register.php" class="button">S'inscrire</a><br>
                        </p>
                </center>
            </div>
        </div>
    </main>
</body>
</html>