<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION["username"])){
  header('Location : ../register.php'); //permet que seul un utilisateur ayant déjà commencé la procédure d'isncription puisse accéder à cette page
}
?>
<head>
  <meta charset="UTF-8">
  <title>Mily - Formulaire alumni</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" href="form.css">
  <link rel="stylesheet" href="../../mainStyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/A2PzavnIG+QF3LXq8ni2D9+GxDX7T9fI3abG7J" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
  
  <style>

body{margin : 0;}

ul{list-style-type:none}

.add-experience-btn {
    display: inline-block;
    background-color: #3498db;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
  }

  .company-wrapper,
  .job-wrapper {
    width: 50%;
    float: left;
    box-sizing: border-box;
    padding: 0 10px;
  }

  .experience-wrapper {
    overflow: hidden;
  }

  .company-description {
    width: 100%;
    box-sizing: border-box;
  }

  input, textarea {
    color: #000;
  }

  .experience-title_bis {
    display: block;
    margin-bottom: 10px;
  }

  .experience-wrapper {
    height : 175px;
  }

  .preferences {
    margin-left: 0;
    padding-left: 0;
    padding-top: 60px;
  }

  .experience{
    min-height: 109vh;
  }


  .resume-wrapper-bis {
    position: relative;
    text-align: center;
    height: 100%;
    padding-top: 30px;
    border-radius: 20%;
  }
      
  </style>
</head>
<header>
    <h1>Commencons votre inscription !</h1>
</header>

<body>
 
  <form action="submit_alumni.php" method="POST" style="">
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
            <h1><input class="experience-title_bis" type="text" name="nom" placeholder="Nom">
              <br/><input class="experience-title_bis" type="text" name="prenom" placeholder="Prenom">
            </h1>
          </div>
        
          <div class="container mt-5">
  

          <div class="clearfix"></div>
          <div class="contact-info clearfix">
            <ul class="list-titles">
              <li>Ecole</li>
              <li>Option 2ème année</li>
              <li>Option 3ème année</li>
              
            </ul>
            
            <ul class="list-content ">
              <li><input class="experience-title_bis" type="text" name="ecole" placeholder="Ecole"></li> 
              <li><input class="experience-title_bis" type="text" name="option2annee" placeholder="Option 2ème année"></li> 
              <li><input class="experience-title_bis" type="text" name="option3annee" placeholder="Option 3ème année"></li> 
              
            </ul>
          </div>
    
    <div class="preferences ">
      <h2>Notation des domaines</h2>
        <div class="mb-32">
          <label for="nucleaire" class="form-label">Nucleaire</label>
          <input type="range" class="form-range" min="0" max="10" step="1" id="nucleaire" name="nucleaire">
        </div>
        <div class="mb-32">
          <label for="aeronautique" class="form-label">Aeronautique</label>
          <input type="range" class="form-range" min="0" max="10" step="1" id="aeronautique" name="aeronautique">
        </div>
        <div class="mb-32">
          <label for="finance" class="form-label">Finance</label>
          <input type="range" class="form-range" min="0" max="10" step="1" id="finance" name="finance">
        </div>
        <div class="mb-32">
          <label for="conseil" class="form-label">Conseil</label>
          <input type="range" class="form-range" min="0" max="10" step="1" id="conseil" name="conseil">
        </div>
        <div class="mb-32">
          <label for="informatique" class="form-label">Informatique</label>
          <input type="range" class="form-range" min="0" max="10" step="1" id="informatique" name="informatique">
        </div>
    </div>
          
        <div class="contact-presentation"> 
          <p> <textarea class="experience-title_bis" type="text" name="descriptionPro" placeholder="Ici tu peux décrire briévement ton objetcif de parcours professionnel"></textarea></p>
          <div class="contact-social clearfix">
            <ul class="list-titles">
              <li>Mail</li>
              <li>LinkedIn</li>
            </ul>
            <ul class="list-content">
              <li><input class="experience-title_bis" type="text" name="mail" placeholder="Mail"></li>
              <li><input class="experience-title_bis" type="text" name="linkedIn" placeholder="LinkedIn"></li> 
        
            </ul>
          </div>
        </div>

      </section>
      

    <section class="experience section-padding">
      <div class="grand-container-experience">
      <div class="container-experience1">
        <div class="type-experience">
          <h3 class="experience-title">Experience intra-IMT Atlantique</h3>
          <div id="experience-container1" >
            <div class="experience-wrapper">
              <div class="company-wrapper clearfix">
                <textarea class="experience-title_bis" type="text" name="company_name1[]" placeholder="Exple:BDE/Junior Entreprise..."></textarea>
                <textarea class="time" type="text" name="time_period1[]" placeholder="1ère année d'école"></textarea>
              </div>
              <div class="job-wrapper clearfix">
                <textarea class="experience-title_bis" type="text" name="job_title1[]" placeholder="Exple: Post Trésorier"></textarea>
                <textarea class="company-description" name="job_description1[]" placeholder="Décrire l'expérience et/ou le lien avec le projet professionnelle."></textarea>
              </div>
            </div>
          </div>
          <a href="#" class="add-experience-btn" onclick="addExperience(1)">Ajouter des informations</a>
        </div>
      </div>
      </div>
    
      <div class="grand-container-experience1">
      <div class="container-experience">
        <div class="type-experience">
          <h3 class="experience-title">Parcours académique Hors-IMT Atlantique</h3>
          <div id="experience-container2" >
            <div class="experience-wrapper">
              <div class="company-wrapper clearfix">
                <textarea class="experience-title_bis" type="text" name="company_name2[]" placeholder="Exple: Echange académique/Double Diplome"></textarea>
                <textarea class="time" type="text" name="time_period2[]" placeholder="Exple: 2ème semestre de la 2ème année"></textarea>
              </div>
            
              <div class="job-wrapper clearfix">
                <textarea class="experience-title_bis" type="text" name="job_title2[]" placeholder="Exple : Option mathématique appliqué"></textarea>
                <textarea class="company-description" type="text" name="job_description2[]" placeholder="Décrire l'experience/la relation avec le projet professionnel"></textarea>
              </div>
            </div>
          </div>
          <a href="#" class="add-experience-btn" onclick="addExperience(2)">Ajouter des informations</a>
        </div>
      </div>
      </div>
      <div class="grand-container-experience1">
      <div class="container-experience">
        <div class="type-experience">
          <h3 class="experience-title">Parcours professionnelle Hors-IMT Atlantique</h3>
          <div id="experience-container3" >
            <div class="experience-wrapper">
              <div class="company-wrapper clearfix">
                <textarea class="experience-title_bis" type="text" name="company_name3[]" placeholder="Exple: Stage/Projet Pro"></textarea>
                <textarea class="time" type="text" name="time_period3[]" placeholder="Exple: 2éme année d'école"></textarea>
              </div>
            
              <div class="job-wrapper clearfix">
                <textarea class="experience-title_bis" type="text" name="job_title3[]" placeholder="Exple: Césure/Stage Fin d'étude/StartUp"></textarea>
                <textarea class="company-description" type="text" name="job_description3[]" placeholder="Décrire l'experience/la relation avec le projet professionnel"></textarea>
              </div>
             
            </div>
          </div>
         </div>
          <a href="#" class="add-experience-btn" onclick="addExperience(3)">Ajouter des informations</a>
        </div>
      </div>
   
    <input type="submit" value="Submit" style="margin-top:40px">

  
  <div class="clearfix"></div>
</div>
</form>
</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'></script>
<script>
function addExperience(nblock) { 
  //fonction css qui va nous permettre de créer les éléments quand l'utilisateur click sur Ajouter des informations
  //le paramêtre nblock permet de savoir à quel block on doit rajouter des cases, ce qui permet en plus d'ajouter au bonne variables les réponses pour qu'elles soient bien traité
  const experienceContainer = document.getElementById('experience-container'+nblock);
  const experienceWrapper = document.createElement('div');
  experienceWrapper.className = 'experience-wrapper';

  experienceWrapper.innerHTML = `
    <div class="company-wrapper clearfix">
      <textarea class="experience-title_bis" type="text" name="company_name`+nblock+`[]" placeholder="Exple:BDE/Junior Entreprise..."></textarea>
      <textarea class="time" type="text" name="time_period`+nblock+`[]" placeholder="1ère année d'école"></textarea>
    </div>
    <div class="job-wrapper clearfix">
      <textarea class="experience-title_bis" type="text" name="job_title`+nblock+`[]" placeholder="Exple: Post Trésorier"></textarea>
      <textarea class="company-description" name="job_description`+nblock+`[]" placeholder="Décrire l'expérience et/ou le lien avec le projet professionnelle."></textarea>
    </div>
  `;
  experienceContainer.appendChild(experienceWrapper);
}
</script>

