<!DOCTYPE html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once("bd_connect.php");
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
            //on supprime l'utilisateur
            $query = "DELETE FROM `user` WHERE id_user = ".$_SESSION["id_user"];

            mysqli_query($conn, $query);
            $error = "Compte supprimé";
            // Rediriger l'utilisateur vers la page d'accueil
            header("Location: index.php?error=".$error);
        } else {
          // Si le mot de passe est incorrect, afficher un message d'erreur sur la page 'supprimer.php'
          $error = "Mot de passe incorrect";

        }
      } else {
        // Si le nom d'utilisateur n'existe pas, afficher un message d'erreur sur la page 'supprimer.php'
        $error = "Nom d'utilisateur incorrect";

      }
    }
}

?>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>ProjetApp - Connexion</title>
    <link href="mainStyle.css" rel="stylesheet">

    <!--Manrope-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">

    <!--Baloo 2-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@800&display=swap" rel="stylesheet">
</head>
<!--changer toutes les polices en baloo et modifier la page pas encore de compte par ici, modifier la forme des boutons accueil et discussions-->
<body>

    <!--Front de page-->
    <header>
        <h1>Mily Supprimer son compte !</h1>
        
    </header>

    <!--Page de connexion-->
    <main>
        <br/>
        <div>
            <center>
            <?php
                echo $error;
            ?>
            </center>
        </div>
        <div class="container_index">
            <div class="connexion">
                <center>
                    <h2>Supprimer son compte</h2>
                    <form method="post" action="supprimer.php">
                    <label for="username">Nom d'utilisateur :</label>
                        <input type="text" id="username" name="username"><br>

                        <label for="password">Mot de passe :</label><br>
                        <input type="password" id="password" name="password"><br>

                        <br /><br />
                        <input type="submit" value="Supprimer" style="margin-top:40px">

                    </form>
                </center>
            </div>
        </div>
    </main>
</body>
</html>