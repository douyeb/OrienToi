<?php
$bdd = new PDO('mysql:host=localhost;port=3306;dbname=tdyivzmprojetapp;charset=utf8', 'root', 'root');

$search = $_GET['search'] ?? '';

if ($search) {
    $searchResults = $bdd->prepare("SELECT * FROM user WHERE username LIKE ? ORDER BY username");
    $searchResults->execute(array('%' . $search . '%'));

    while ($user = $searchResults->fetch()) {
        echo '<a href="message.php?id_user=' . $user['id_user'] . '" class="list-group-item list-group-item-action">';
        echo $user['username'];
        echo '</a>';
    }
}
?>
