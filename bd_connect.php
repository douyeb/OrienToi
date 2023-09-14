<?php

//connexion à la base de donnée de notre serveur

$host = "localhost";
$dbname = "tdyivzmprojetapp";
$username_db = "root";
$password_db = "root";
$port=3306;
$conn = mysqli_connect($host, $username_db, $password_db, $dbname,$port);

?>