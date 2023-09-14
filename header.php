<!DOCTYPE html>

<?php
session_start();
function generate_header($n){
    //Cette fonction permet de générer le header pour toute les pages du site
    //la fonction prend en paramêtre le nombre de fois qu'il faut revenir en arrière dans le chemin directoir pour revenir à la racine du projet où se trouve le fichier
    

    #sécurisation du serveur (si la variable id_user n'est pas set il n'y pas de connexion on renvoit sur index.php)

    if (!isset($_SESSION["id_user"])){
        header('Location: '.include_back_root($n).'index.php');
    }

    // on set dans un array les différents endroits où l'on redirige avec le nom et le chemin directif
    $ref = array('0' => array("Accueil","home.php"),'1'=> array("Discussions","discussion/discussion.php"),'2' => array("Déconnexion","index.php"));

    echo    '<head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta charset="utf-8">
                <link rel="stylesheet" href="'.include_back_root($n).'mainStyle.css" >
            

                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
            

                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@800&display=swap" rel="stylesheet">
            </head>';
    echo    '<header>
                <div>
                    <h1> Mily !</h1>
                </div>
                <div class="droite">
                    <ul style="list-style:none;margin:0">';
    //on génére les 3 boutons
    for ($j = 0; $j<3; $j++){

        $data = $ref[strval($j)];
        echo            '<li>
                            <a href="'.include_back_root($n).$data[1].'" class="lien">'.$data[0].' </a>
                        </li>';
        }
    echo '          </ul>
                </div>
            </header>';
    }

function include_back_root($n){
    //permet d'inclure des ../ qui permettent de revenir au dossier parent
    $str = '';
    for ($k = 0; $k<$n; $k++){
        $str .= '../';
    }
    return $str;
}

?>

