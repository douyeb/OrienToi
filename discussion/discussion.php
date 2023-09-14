<?php
session_start();


$bdd = new PDO('mysql:host=localhost;port=3306;dbname=tdyivzmprojetapp;charset=utf8', 'root', 'root');


if (!$_SESSION['username']){
    header('Location: ../index.html');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mily - Discussions</title>
  <!-- CSS de Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="discussion.css">

  <!-- JavaScript/jQuery de Bootstrap (nécessite Popper.js) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>

<?php  
include_once ('../header.php');
generate_header(1);
?>

<body>
  <div class="subheader">
    <h1> Discussions en cours </h1>
  </div>
  <div class="container">
    <div class="form-group">
      <input type="text" id="search-user" class="form-control" placeholder="Rechercher un utilisateur">
    </div>
    <div class="list-group" id="search-results"></div>

  <?php

  $recupUser = $bdd->query('SELECT * FROM user');
  while ($user = $recupUser->fetch()) {
    if ($user['id_user'] !== $_SESSION['id_user']) {
      // Vérifier si un message existe entre les deux utilisateurs
      $checkMessage = $bdd->prepare('SELECT * FROM message WHERE (id_auteur = ? AND id_destinataire = ?) OR (id_auteur = ? AND id_destinataire = ?)');
      $checkMessage->execute(array($_SESSION['id_user'], $user['id_user'], $user['id_user'], $_SESSION['id_user']));
      $hasMessage = $checkMessage->rowCount() > 0;

      // Si un message existe, affichez le profil de l'utilisateur
      if ($hasMessage) {
        $lastMessageQuery = $bdd->prepare('SELECT * FROM message WHERE (id_auteur = ? AND id_destinataire = ?) OR (id_auteur = ? AND id_destinataire = ?) ORDER BY id DESC LIMIT 1');
        $lastMessageQuery->execute(array($_SESSION['id_user'], $user['id_user'], $user['id_user'], $_SESSION['id_user']));
        $lastMessage = $lastMessageQuery->fetch();
        $truncatedMessage = '';
        if (is_array($lastMessage)) {
            $truncatedMessage = mb_strimwidth($lastMessage['message'], 0, 30, '...');
        }
    
  ?>
      <a href="message.php?id_user=<?php echo $user['id_user']; ?>" class="list-group-item list-group-item-action">
        <div class="user-block">
        <img src="Photo1.jpg" alt="user-photo" class="user-photo" width="50" height="50">
          <div>
            <?php echo $user['username']; ?> - <small><?= $truncatedMessage; ?></small>
          </div>
        </div>
      </a>
  <?php
        }
      }
    }
    
  ?>
</div>
    </div>
  </div>
  <script>
  $(document).ready(function() {
    // Écoutez les événements de saisie dans le champ de recherche
    $("#search-user").on("input", function() {
      const searchValue = $(this).val();
      
      if (searchValue) {
        // Envoyez une requête AJAX pour obtenir des suggestions d'utilisateur
        $.ajax({
          url: "../decouvertealumni/search_user.php",
          type: "GET",
          data: { search: searchValue },
          success: function(data) {
            $("#search-results").html(data);
          }
        });
      } else {
        $("#search-results").empty();
      }
    });
  });
  </script>


</body>
</html>
