<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Mily - Domaine à choisir</title>
  <link href="styledomaine.css" rel="stylesheet">
</head>

  <body>

    <!--Front de page-->
    <?php
    include_once("../header.php");
    generate_header(1);
    ?>
    <div class="subheader">
      <h1>Choisis tes domaines</h1>
    </div>
    
    <div class="container_domaine">

      <div class="label-wrapper">
        <a href = "domaineSelect.php?domaine=informatique">
          <img class="image_domaine"src="img/informatique.jpg" alt="informatique"></img>
        </a>
        <div>Informatique</div>
      </div>

      <div class="label-wrapper">
        <a href = "domaineSelect.php?domaine=finance">
          <img class="image_domaine"src="img/finance.jpeg" alt="finance"></img>
        </a>
        <div>Finance</div>
      </div>

        <div class="label-wrapper">
        <a href = "domaineSelect.php?domaine=nucleaire">
            <img class="image_domaine"src="img/nucleaire.jpeg" alt="nucleaire"></img>
          </a>
            <div>Nucléaire</div>
        </div>

        <div class="label-wrapper">
        <a href = "domaineSelect.php?domaine=big_data">
            <img class="image_domaine"src="img/bigdata.jpg" alt="big data"></img>
          </a>
            <div>Big data</div>
        </div>

        <div class="label-wrapper">
        <a href = "domaineSelect.php?domaine=conseil">
            <img class="image_domaine"src="img/conseil.jpg" alt="conseil"></img>
          </a>
            <div> Conseil</div>
        </div>

        <div class="label-wrapper">
        <a href = "domaineSelect.php?domaine=aeronautique">
            <img class="image_domaine"src="img/aeronautique.jpg" alt="aeronautique"></img>
          </a>
            <div> Aéronautique</div>
        </div>
  </body>
</html>
