<?php
session_start();
include_once("../../bd_connect.php");

if (!isset($_SESSION['username'])){
    header('Location: ../register.php');
}

$username = $_SESSION['username'];

// Récupérer les données des tables alumni et block_parcours
$query = "SELECT * FROM alumni WHERE id_user=(SELECT id_user FROM user WHERE username='$username')";
$result = mysqli_query($conn, $query);
$alumni = mysqli_fetch_assoc($result);

$query = "SELECT * FROM block_parcours WHERE id_user=(SELECT id_user FROM user WHERE username='$username')";
$result = mysqli_query($conn, $query);
$parcours = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Modifier Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Modifier votre profil</h1>

    <form action="submit_alumni_edit.php" method="post">
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" value="<?php echo $alumni['nom']; ?>"><br>

        <label for="prenom">Prenom:</label><br>
        <input type="text" id="prenom" name="prenom" value="<?php echo $alumni['prenom']; ?>"><br>

        <label for="ecole">Ecole:</label><br>
        <input type="text" id="ecole" name="ecole" value="<?php echo $alumni['ecole']; ?>"><br>

        <label for="descriptionPro">Description professionnelle:</label><br>
        <input type="text" id="descriptionPro" name="descriptionPro" value="<?php echo $alumni['texte descriptif']; ?>"><br>

        <label for="option2annee">Option 2ème année:</label><br>
        <input type="text" id="option2annee" name="option2annee" value="<?php echo $alumni['options_2eme_annee']; ?>"><br>

        <label for="option3annee">Option 3ème année:</label><br>
        <input type="text" id="option3annee" name="option3annee" value="<?php echo $alumni['options_3eme_annee']; ?>"><br>

        <label for="mail">Email:</label><br>
        <input type="email" id="mail" name="mail" value="<?php echo $alumni['mail']; ?>"><br>

        <label for="linkedIn">LinkedIn:</label><br>
        <input type="text" id="linkedIn" name="linkedIn" value="<?php echo $alumni['linkedIn']; ?>"><br>

        <?php foreach ($parcours as $p): 
            $query_type = "SELECT `Titre` FROM `type_parcours` WHERE id_type_parcours='" . $p['id_type_parcours'] . "'";
            $result_type = mysqli_query($conn, $query_type);
            $row_type = mysqli_fetch_assoc($result_type);
        ?>
        
            <h2><?php echo $row_type['Titre']; ?></h2>

            <label for="company<?php echo $p['id_type_parcours']; ?>">Company:</label><br>
            <input type="text" id="company<?php echo $p['id_type_parcours']; ?>" name="company<?php echo $p['id_type_parcours']; ?>" value="<?php echo $p['company']; ?>"><br>

            <label for="time<?php echo $p['id_type_parcours']; ?>">Time:</label><br>
            <input type="text" id="time<?php echo $p['id_type_parcours']; ?>" name="time<?php echo $p['id_type_parcours']; ?>" value="<?php echo $p['time']; ?>"><br>

            <label for="experience_title<?php echo $p['id_type_parcours']; ?>">Experience title:</label><br>
            <input type="text" id="experience_title<?php echo $p['id_type_parcours']; ?>" name="experience_title<?php echo $p['id_type_parcours']; ?>" value="<?php echo $p['experience_title']; ?>"><br>

            <label for="description<?php echo $p['id_type_parcours']; ?>">Description:</label><br>
            <input type="text" id="description<?php echo $p['id_type_parcours']; ?>" name="description<?php echo $p['id_type_parcours']; ?>" value="<?php echo $p['description']; ?>"><br>
        <?php endforeach; ?>

        <input type="submit" value="Enregistrer les modifications">
    </form>
</body>
</html>
