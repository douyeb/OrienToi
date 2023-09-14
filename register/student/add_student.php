<?php
// Connexion à la base de données
include_once("../../bd_connect.php");

// Démarrage de la session
session_start();

//sécurité
if (!isset($_SESSION['username'])){
    header('Location : ../register.php');
}

// Récupération des données de la session
$username = $_SESSION['username'];
$password = $_SESSION['password'];

//ajout user
$query = "INSERT INTO `user` (`username`, `password`) VALUES ('$username', '$password')";
$result = mysqli_query($conn, $query);
$query = "SELECT id_user FROM user WHERE username='$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result)[0];
$_SESSION['id_user'] = intval($row);
$user_id = $_SESSION['id_user'];


//ajout dans student
$query_student = "INSERT INTO `students` VALUES ('".$_SESSION['id_user']."')";



// Récupérer les données du formulaire
$finance = intval($_POST['finance']);
$aeronautique = intval($_POST['aeronautique']);
$informatique = intval($_POST['informatique']);
$nucleaire = intval($_POST['nucleaire']);
$conseil = intval($_POST['conseil']);

//on vérifie si la préférence existe déjà

$query = "SELECT `id_preferences` FROM `preferences_utilisateurs` WHERE informatique = ".$informatique." AND aeronautique = ".$aeronautique.
                                                        " AND nucleaire = ".$nucleaire." AND conseil =".$conseil." AND finance = ".$finance; 
    
$result1 = mysqli_query($conn, $query);
$id_preference = intval(mysqli_fetch_row($result1)[0]);

//si c'est pas le cas on l'ajoute
if (mysqli_num_rows($result1) == 0){
    $query = "INSERT INTO `preferences_utilisateurs` (`nucleaire`, `aeronautique`, `finance`, `conseil`, `informatique`) VALUES (".$nucleaire.",".$aeronautique.",".$finance.",".$conseil.",".$informatique.")";
    mysqli_query($conn,$query);
    $query = "SELECT `id_preferences` FROM `preferences_utilisateurs` WHERE informatique = ".$informatique." AND aeronautique = ".$aeronautique.
                                                        " AND nucleaire = ".$nucleaire." AND conseil =".$conseil." AND finance = ".$finance; 
    
    $result1 = mysqli_query($conn, $query);
    $id_preference = intval(mysqli_fetch_row($result1)[0]);
}

//la préférence existe donc forcément on peut recup le numéro et update
$query1 = "UPDATE `user` SET `user_preference` = ".$id_preference." WHERE `user`.`id_user` = ".$user_id." ";
mysqli_query($conn,$query1);

if ($result && mysqli_query($conn, $query_student)) {
    header('Location : ../../home.php');
} else {
    echo $query;
    echo "Erreur : " . mysqli_error($conn);
}



?>
