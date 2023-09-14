<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION["username"])){
  header('Location : ../register.php');
}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../alumnis/form.css">
    <link rel="stylesheet" href="../../mainStyle.css" >
    <title>Mily - Formulaire des étudiants</title>
  </head>

  <header>
    <h1>Commencons votre inscription !</h1>
  </header>
  <style>
    .mb-32{
      padding-bottom: 5px;
    }
  </style>

  <body>
    <h1 style = 'padding-top: 40px; display: flex; justify-content: center;'>Formulaire des étudiants</h1>
    <form action="add_student.php" method="Post" style="padding-top: 20px;">
      <div class="preferences" style="display: flex; align-content: center; flex-direction: column; flex-wrap: wrap;">
        <h2 style = "padding-bottom: 10px;">Notation des domaines</h2>
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
      <center>
        <input type="submit" value="Submit">
      </center>
      
    </form>
  </body>
</html>