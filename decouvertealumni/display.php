<!DOCTYPE html>

<?php
  if (!isset($_GET['id_user'])){    
    header('Location : ../index.html');
  }
?>

<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title>Mily - Découverte d'un profil</title>
  <link rel="stylesheet" href= "display.css">
</head>




<?php
        include_once("../header.php");
        generate_header(1);
        //on va chercher les informations de l'alumni (celle de la table alumnis et on remplis la partie de gauche de la page)
        include_once("../bd_connect.php");
        $query = "SELECT * FROM `alumni` WHERE id_user = ".$_GET['id_user'];
        $result = mysqli_query($conn,$query);
        $result = mysqli_fetch_array($result);
        

    ?>
    <div class="subheader">
        <h1> Découvre le profil de <?php echo $result['prenom']?> <?php echo $result['nom']?></h1>
    </div>
<body>

<div class="resume-wrapper-bis">
	<section class="profile section-padding">
		<div class="container">
			<div class="picture-resume-wrapper">
        <div class="picture-resume">
        <span><img src="https://secure.gravatar.com/avatar/24a495e3a7316e619af62445f1a86886?s=96&d=mm&r=g" alt="" /></span>
        <svg version="1.1" viewBox="0 0 350 350">
  
  <defs>
    <filter id="goo">
      <feGaussianBlur in="SourceGraphic" stdDeviation="8" result="blur" />
      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 21 -9" result="cm" />
    </filter>
  </defs>
  
  
<g filter="url(#goo)" >  
  
  <circle id="main_circle" class="st0" cx="171.5" cy="175.6" r="130"/>
  
  <circle id="circle" class="bubble0 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble1 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble2 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble3 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble4 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble5 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble6 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble7 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble8 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble9 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble10 st1" cx="171.5" cy="175.6" r="122.7"/>

</g>  
</svg>
      </div>
         <div class="clearfix"></div>
    </div>


      <div class="name-wrapper">
        <h1> <?php echo $result['prenom']?> <br/><?php echo $result['nom']?></h1>
      </div>
      <div class="clearfix"></div>
      <div class="contact-info clearfix">
      	<ul class="list-titles">
      		<li>Ecole</li>
      		<li>Option 2ème année</li>
      		<li>Option 3ème année</li>
      	</ul>
        <ul class="list-content ">
        	<li><?php echo $result['ecole']?></li> 
        	<li><?php echo $result['options_2eme_annee']?></li> 
        	<li><?php echo $result['options_3eme_annee']?></li> 
        </ul>
      </div>
      <div class="contact-presentation"> 
      	<p><span class="bold">Description de l'alumni</span> <?php echo $result['texte descriptif']?></p>
      </div>
      <div class="contact-social clearfix">
      	<ul class="list-titles">
      		<li>Mail</li>
      		<li>LinkedIn</li>
      		
      	</ul>
        <ul class="list-content">
      		<li><a href=""><?php echo $result['mail']?></a></li>
      		<li><a href=""><?php echo $result['linkedIn']?></a></li> 
    
      	</ul>
      </div>
		</div>
	</section>
  
  <section class="experience section-padding">
  	<div class="container">
        <?php
            //on rempli la partie de droite de la page
            $query = "SELECT * FROM `block_parcours` NATURAL JOIN `type_parcours` Where id_user = ".$_GET['id_user']." ORDER BY id_type_parcours ASC";
            $result = mysqli_query($conn, $query);
            $id_parcours = 0;
            while($row = mysqli_fetch_row($result)){
              if(intval($row[0]) != $id_parcours){
                if($id_parcours != 0){
                  echo '</div> </div>';
                }

                $id_parcours = intval($row[0]);
                echo '<div class="type-experience">';
                echo '<h3 class="experience-title">'.mb_convert_encoding(nl2br($row[7]), 'UTF-8', 'ISO-8859-1').'</h3>';
                echo '<div class="experience-wrapper" style="height: 100px;">';

              }

                echo '<div class="company-wrapper clearfix">';
                echo '<div class="experience-title">'.$row[3].'</div>';
                echo '<div class="time">'.$row[4].'</div></div>';
                echo '<div class="job-wrapper clearfix">';
                echo '<div class="experience-title">'.$row[5].'</div>'; 
                echo '<div class="company-description">';
                echo '<p>'.$row[6].'</p>';
                echo '</div></div>';
            }
            if ($id_parcours != 0){
              echo '</div> </div>';
            }
            
        ?>
      
      <div class="section-wrapper clearfix">
      	
      
      
        <h3 class="section-title">Préférences</h3>
        
        <?php
        //on affiche les préférences
        include_once("../bd_connect.php");
        $query = "SELECT * FROM `preferences_utilisateurs` JOIN `user` ON preferences_utilisateurs.id_preferences=user.user_preference WHERE id_user = ".$_GET['id_user'];
        $result = mysqli_query($conn,$query);
        $result = mysqli_fetch_array($result);

        $theme = array('nucleaire','aeronautique','finance','conseil','informatique');

        for ($k = 0;$k<5; $k++){
          echo $theme[$k];
          echo '<div class="progress">';
          $pourcentage = intval($result[$theme[$k]])*10;
          echo   '<div class="progress-bar" style="width:'.$pourcentage.'%;"></div>';
          echo '</div>';
        }
        ?>
        
      </div>
      
    
      
  	</div>
  </section>
  
  <div class="clearfix"></div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'></script>
<script  src="function.js"></script>

</body>
</html>