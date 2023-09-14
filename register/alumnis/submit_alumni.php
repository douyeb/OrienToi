<?php 
session_start();
include_once("../../bd_connect.php");
if (!isset($_SESSION['username'])){
    header('Location : ../register.php');
}

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

//si ce n'est pas le cas, on l'a crée
if (mysqli_num_rows($result1) == 0){
    $query = "INSERT INTO `preferences_utilisateurs` (`nucleaire`, `aeronautique`, `finance`, `conseil`, `informatique`) VALUES (".$nucleaire.",".$aeronautique.",".$finance.",".$conseil.",".$informatique.")";
    mysqli_query($conn,$query);
    $query = "SELECT `id_preferences` FROM `preferences_utilisateurs` WHERE informatique = ".$informatique." AND aeronautique = ".$aeronautique.
                                                        " AND nucleaire = ".$nucleaire." AND conseil =".$conseil." AND finance = ".$finance; 
    
    $result1 = mysqli_query($conn, $query);
    $id_preference = intval(mysqli_fetch_row($result1)[0]);
}



//la préférence existe donc forcément dorénavent, on peut recup le numéro et update
$query1 = "UPDATE `user` SET `user_preference` = ".$id_preference." WHERE `user`.`id_user` = ".$user_id." ";
mysqli_query($conn,$query1);


//on ajoute les informations personnelles de l'alumni
$query =  "INSERT INTO `alumni` VALUES (".$user_id.",'".$_POST['nom']."','".$_POST['prenom']."'
                                        ,'".$_POST['ecole']."','".$_POST['descriptionPro']."'
                                        ,'".$_POST['option2annee']."','".$_POST['option3annee']."'
                                        ,'".$_POST['mail']."','".$_POST['linkedIn']."')";
mysqli_query($conn, $query);


//on ajoute les informations de l'alumni
for($k=1;$k<4;$k++){
    $nrow = sizeof($_POST['job_title'.$k]);
    for ($j = 0;$j<$nrow;$j++){
        $query = "INSERT INTO `block_parcours` (id_user,id_type_parcours,company,time,experience_title,description) 
        VALUES (".$user_id.",'$k','".$_POST['company_name'.$k][$j]."'
        ,'".$_POST['time_period'.$k][$j]."','".$_POST['job_title'.$k][$j]."','".$_POST['job_description'.$k][$j]."')";
        mysqli_query($conn, $query);
    }
}

header('Location : ../../home.php')

?>