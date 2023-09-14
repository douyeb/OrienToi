<!-- Début Home.php -->
<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// on utilise le header générer par la fonction, ici l'argument est 0 car on est à la racine comme le fichier header.php
include_once('header.php');
generate_header(0);
?>
<html lang="fr">
<head>
    <title>Mily - Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="subheader">
    <h1>Accueil</h1>
</div>
<div class = container_home>
<div>
    <a href='./domaine/DecSoiMemeDom.php' class='bouton_orange' style="  background-image: url('./images/orange.png');
"> Découvrir par soi-même </a>
</div>
<div>
    <a href='./decouvertealumni/exploration_alumni_filtre.php' class='bouton_rose' style="  background-image: url('./images/rose.png');
"> Découvrir à travers les alumnis </a>
</div>
<div>
    <a  href='./register/alumnis/edit_form.php' class='bouton_vert'> Modifier le formulaire </a>
</div>

</div>
</body>
</html>
<!-- Fin Home.php -->
