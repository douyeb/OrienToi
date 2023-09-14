<!DOCTYPE html>
<html lang="fr">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="styledomaine.css" rel="stylesheet">
    <style>

        li{
            padding-top: 1px;
        }
        @media (orientation = landscape){
            li{
                padding-top: 3px;
            }
        }

    </style>
</head>
<body>
<?php
//permet de réduire la taille du texte et d'afficher que le début
//Cela a été décidé pour éviter d'avoir des gros blocks de textes ce qui ne donne pas envie de les lire
function truncateWords($input, $numWords) {
    $words = preg_split("/[\n\r\t ]+/", $input, $numWords + 1, PREG_SPLIT_NO_EMPTY);
    if (count($words) > $numWords) {
        array_pop($words);
        $output = implode(' ', $words);
        $output = rtrim($output);
        return $output . '...';
    } else {
        return $input;
    }
}

session_start();
//on check si un sous domaine à été choisi
if (isset($_GET['sous_domaine'])){
    include_once('../bd_connect.php');
    $sous_domaine = $_GET['sous_domaine'];
    //on récup les infos dans la base de données
    $query = "SELECT `competences_necessaires`, `taches_quotidiennes`, `description_metier`, `differences_avec`, `quoi_retenir` FROM `sous_domaines` Where nom = '$sous_domaine'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->bind_result($competences, $taches, $description, $differences,$quoi);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
}
    
else{
    header("Location : DecSoiMemeDom.php");
}
include '../header.php'; generate_header(1); 

//on affiche ces données. On utilise des convertions sinon il y a des problèmes avec les accents
?>

<title><?php echo 'Mily - '. mb_convert_encoding(ucfirst($sous_domaine), 'UTF-8', 'UTF-8'); ?></title>
<div class="subheader">
    <h1><?php echo mb_convert_encoding(ucfirst($sous_domaine), 'UTF-8', 'UTF-8'); ?></h1>
</div>

<div class="container_bis">
    <div class="row">
       <div class="col-md-6">
            <div class="card my-4 card-container" data-aos="fade-up">
                <div class="card-body">
                    <h2 class="h2-box">Description du métier</h2>
                    <p class="text-truncate" style="color: #666666;" id="description-truncated"><?php echo mb_convert_encoding(truncateWords(nl2br($description), 300), 'UTF-8', 'UTF-8');?>...</p>
                    <p class="d-none" style="color: #666666;" id="description-full"><?php echo mb_convert_encoding(nl2br($description), 'UTF-8', 'UTF-8');?></p>
                    <button class="btn-more" onclick="toggleDescription()">Voir plus</button>
                </div>
            </div>
            <div class="card my-4 card-container" data-aos="fade-up">
                <div class="card-body">
                    <h2 class="h2-box">Tâches quotidiennes</h2>
                    <p class="text-truncate" style="color: #666666;" id="tasks-truncated"><?php echo mb_convert_encoding(truncateWords(nl2br($taches), 300), 'UTF-8', 'UTF-8'); ?>...</p>
                    <p class="d-none" style="color: #666666;" id="tasks-full"><?php echo mb_convert_encoding(nl2br($taches), 'UTF-8', 'UTF-8'); ?></p>
                    <button class="btn-more" onclick="toggleTasks()">Voir plus</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card my-4 card-container" data-aos="fade-up">                
                <div class="card-body">
                    <h2 class="h2-box">Compétences nécessaires</h2>
                    <p class="text-truncate" style="color: #666666;" id="skills-truncated"><?php echo mb_convert_encoding(truncateWords(nl2br($competences), 300), 'UTF-8', 'UTF-8'); ?>...</p>
                    <p class="d-none" style="color: #666666;" id="skills-full"><?php echo mb_convert_encoding(nl2br($competences), 'UTF-8', 'UTF-8'); ?></p>
                    <button class="btn-more" onclick="toggleSkills()">Voir plus</button>
                </div>
            </div>
            <div class="card my-4 card-container" data-aos="fade-up">
                <div class="card-body">
                    <h2 class="h2-box">Quoi retenir ?</h2>
                    <p class="text-truncate" style="color: #666666;" id="summary-truncated"><?php echo mb_convert_encoding(truncateWords(nl2br($quoi), 300), 'UTF-8', 'UTF-8'); ?>...</p>
                    <p class="d-none" style="color: #666666;" id="summary-full"><?php echo mb_convert_encoding(nl2br($quoi), 'UTF-8', 'UTF-8'); ?></p>
                    <button class="btn-more" onclick="toggleSummary()">Voir plus</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1200,
    });

    function toggleDescription() {
        $('#description-truncated').toggleClass('d-none');
        $('#description-full').toggleClass('d-none');
    }

    function toggleTasks() {
        $('#tasks-truncated').toggleClass('d-none');
        $('#tasks-full').toggleClass('d-none');
    }

    function toggleSkills() {
        $('#skills-truncated').toggleClass('d-none');
        $('#skills-full').toggleClass('d-none');
    }
    


    function toggleSummary() {
        $('#summary-truncated').toggleClass('d-none');
        $('#summary-full').toggleClass('d-none');
    }
</script>
</body>
</html>
