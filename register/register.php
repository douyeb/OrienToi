<?php
// Démarrage de la session
session_start();
//connexion base de données
include_once("../bd_connect.php");


// Vérification de la méthode de requête
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : "";
    $profile = isset($_POST['profile']) ? $_POST['profile'] : "";

    // Vérification que les données nécessaires sont présentes
    if (empty($username) || empty($password) || empty($profile)) {
        die("Erreur : certaines données sont manquantes.");
    }

    // Stockage des données dans la session
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['profile'] = $profile;


    $query = "SELECT username FROM `user` WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) != 0) {
        //le nom d'utilisateur existe déjà
        $error = "un alumni avec le même nom d'utilisateur existe déjà.";
        header("Location : register.php?error=".$error); # on redirige vers register en précisant cette erreur
    }

    // Redirection en fonction du profil vers le bon formulaire
    if ($profile == 'student') {
        header('Location: /register/student/student.php');
        exit();
    } elseif ($profile == 'alumni') {
        header('Location: /register/alumnis/form.php');
        exit();
    }
} 

else {

    // Affichage du formulaire
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mily - Register</title>
    
    <!--Manrope-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">

    <!--Baloo 2-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@800&display=swap" rel="stylesheet">
    <link href="../mainStyle.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
    
</style>

<body>

<header>
    <h1>Commencons votre inscription !</h1>
</header>
    <br />
    <div>
        <center>
        <?php
            echo $_GET['error'];
        ?>
        </center>
    </div>
    <div class="container_register">
        <div class="connexion">
            <center>
                <h2>S'inscrire</h2> <br/>
                <form method="post" action="register.php">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br>

                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br>

                <label>Profil:</label><br>
                <input type="radio" id="student" name="profile" value="student" required>
                <label for="student">Étudiant</label>
                <input type="radio" id="alumni" name="profile" value="alumni" required>
                <label for="alumni">Alumni</label><br>

                <input type="submit" value="Submit">
                    <br/>
                </form>      
            </center>
        
        </div>
    </div> 
    
</body>
</html>
<?php
} 



