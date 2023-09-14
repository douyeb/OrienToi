<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="explo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css">
    <title>Mily - Découvrir les alumnis</title>

    
</head>
<body> 
<?php include '../header.php'; generate_header(1);?>
    <div class="profiles-container">
        <div class="container">
            <div class="title-container" style="position: relative;">
                <h1>Voici les profils d'étudiants correspondant à vos préférences </h1>
                <img src="alumni.png" alt="Alumni 1" class="alumni1">
                <img src="alumni2.png" alt="Alumni 2" class="alumni2">
                <img src="alumni3.png" alt="Alumni 3" class="alumni3">
            </div>
            <div class="box_container">
        <?php
        session_start();
        include_once("../bd_connect.php");
        $user_id = $_SESSION['id_user'];

        $query_student = "SELECT user_preference FROM `user` WHERE id_user=".$user_id;
        $requete_etudiants = mysqli_query($conn, $query_student);
        $id_pref = mysqli_fetch_row($requete_etudiants)[0];
        
        $query = "SELECT alumni.*,user.username , ABS(p1.nucleaire-p2.nucleaire)+ABS(p1.conseil-p2.conseil)+ABS(p1.finance-p2.finance)+ABS(p1.aeronautique-p2.aeronautique) + ABS(p1.informatique-p2.informatique) AS Distance FROM `preferences_utilisateurs` AS p1
                JOIN `preferences_utilisateurs` AS p2 
                JOIN `user` ON user.user_preference = p1.id_preferences
                JOIN `alumni` ON user.id_user = alumni.id_user
                WHERE p2.id_preferences = ".$id_pref." AND alumni.id_user != ".$user_id."
                ORDER BY Distance ASC
                LIMIT 50;";

        $requete_etudiants = mysqli_query($conn, $query);
        $compteur = 1;
        while ($donnees = mysqli_fetch_assoc($requete_etudiants)) {
            
            echo '  <div class="profile-box" data-aos="fade-up" data-aos-duration="1000">';
            echo '      <div class="image-container">';
            echo '          <img src="profil.jpg" alt="Image du profil" class="img-fluid">';
            echo '      </div>';
            echo '      <div  class="profile_rank"><h1>'.$compteur.'</h1></div>';
            echo '      <div class="profile-info">';       
            echo '          <h2 style="color: #666666;">' . $donnees['username'] . '</h2>';
            echo '          <p style="color: #666666;">Ecole: ' . $donnees['ecole'] . '</p>';
            echo '          <p style="color: #666666;" >Options 2A: ' . $donnees['options_2eme_annee'] . '</p>';
            echo '          <p style="color: #666666;" >Options 3A: ' . $donnees['options_3eme_annee'] . '</p>'; 
            echo '          <form action="display.php" method="GET" style="padding-bottom:5px">';
            echo '              <input type="hidden" name="id_user" value="' . $donnees['id_user'] . '">';
            echo '              <input type="submit" class="btn btn-primary" value="Voir les détails">'; 
            echo '          </form>';
            echo '          <form action="../discussion/message.php" method="GET">';
            echo '          <input type="hidden" name="id_user" value="' . $donnees['id_user'] . '">';
            echo '           <input type="submit" class="btn btn-secondary" value="Envoyer un message">';
            echo '          </form>';
            echo '      </div>';
            echo '</div>';
            $compteur +=1;
        }
        ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    
</body>
</html>

