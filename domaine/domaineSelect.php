<!DOCTYPE html>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<head>
    
    <link href="styledomaine.css" rel="stylesheet">
    <?php include_once("../header.php");
    generate_header(1) ?>

<div class="subheader">
  <h1> Choisis ton sous-domaine </h1>
</div>

<?php

if (isset($_GET['domaine'])){
    include_once('../bd_connect.php');
    // on récupère les sous-domaines associés au domaine enregistré dans la variable $_GET
    $query = "SELECT sous_domaines.nom FROM `sous_domaines` 
            JOIN domaines ON sous_domaines.id_domaine = domaines.id_domaine 
            WHERE domaines.nom_domaine LIKE '".$_GET['domaine']."'";
    $result = mysqli_query($conn, $query);
    echo '
            <div class="container_domaine">';

    while ($row = mysqli_fetch_row($result)){
      //on affiche tous les sous-domaines que la requête nous a donné

      echo "<div class='label-wrapper'>";
        echo "<a href = \"sousDomaineSelect.php?sous_domaine=".$row[0]."\">"; //on met la redirection
        echo "<img class='image_domaine' src='img/".$row[0].".jpg'></img>"; //on met l'image
        echo "</a>";
      echo "<div>".$row[0]."</div></div>"; //on met une étiquette avec le nom du sous-domaine
    }
    echo    
    "</div>";
}      

else{
    header("Location : DecSoiMemeDom.html"); //si aucun domaine n'a été sélectionné
}
?>
 <title><?php echo 'Mily - '.$_GET['domaine']?></title>