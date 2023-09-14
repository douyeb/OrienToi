<?php
session_start();
include_once("../../bd_connect.php");

if (!isset($_SESSION['username'])){
    header('Location: ../register.php');
}

$username = $_SESSION['username'];
$user_id = (SELECT id_user FROM user WHERE username='$username');

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$ecole = $_POST['ecole'];
$descriptionPro = $_POST['descriptionPro'];
$option2annee = $_POST['option2annee'];
$option3annee = $_POST['option3annee'];
$mail = $_POST['mail'];
$linkedIn = $_POST['linkedIn'];

// Update alumni info
$query = "UPDATE `alumni` SET `nom` = '$nom', `prenom` = '$prenom', `ecole` = '$ecole', `texte descriptif` = '$descriptionPro', `options_2eme_annee` = '$option2annee', `options_3eme_annee` = '$option3annee', `mail` = '$mail', `linkedIn` = '$linkedIn' WHERE `id_user` = $user_id";
mysqli_query($conn, $query);

// Update block_parcours info
$query = "SELECT id_parcours FROM block_parcours WHERE id_user = $user_id";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $id_parcours = $row['id_parcours'];
    $company = $_POST['company' . $id_parcours];
    $time = $_POST['time' . $id_parcours];
    $experience_title = $_POST['experience_title' . $id_parcours];
    $description = $_POST['description' . $id_parcours];
    $query = "UPDATE `block_parcours` SET `company` = '$company', `time` = '$time', `experience_title` = '$experience_title', `description` = '$description' WHERE `id_parcours` = $id_parcours";
    mysqli_query($conn, $query);
}

header('Location: ../../home.php');
?>
