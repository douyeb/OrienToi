<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// Connexion à la base de données
include_once("../bd_connect.php");
session_start();



// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Récupérer les valeurs des champs d'entrée
  $username = $_POST["username"];
  $password = $_POST["password"];

  

  // Vérifier si les champs ont été remplis
  if (!empty($username) && !empty($password)) {

    // Vérifier si le nom d'utilisateur et le mot de passe sont corrects en cherchant dans la table 'member'
    $query = "SELECT * FROM `user` WHERE username = '".$username."'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row['password'])) {
        // Enregistrer le nom d'utilisateur dans la session
        $_SESSION["username"] = $username;
        $_SESSION["id_user"] = $row['id_user'];
        // Rediriger l'utilisateur vers la page d'accueil
        header("Location:../home.php");
      } else {
        // Si le mot de passe est incorrect, afficher un message d'erreur sur la page 'login.php'
        $error = "Mot de passe incorrect";
        header("Location:../index.php?error=$error");
      }
    } else {
      // Si le nom d'utilisateur n'existe pas, afficher un message d'erreur sur la page 'login.php'
      $error = "Nom d'utilisateur incorrect";
      header("Location:../index.php?error=$error");
    }



  } else {
    // Si les champs ne sont pas remplis, afficher un message d'erreur sur la page 'login.php'
    $error = "Veuillez remplir tous les champs";
    header("Location:../index.php?error=$error");
  }
}

?>
