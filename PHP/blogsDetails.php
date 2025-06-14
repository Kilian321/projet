<?php
session_start();
require_once '../DATA-BASE/database.php';
global $pdo;
require_once "navbar.php";
?>
<?php
/*Affichage erreurs php*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Archéo-IT Détails</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../PICTURE/Archeo-IT_Logo-removebg-preview.png">
    <!--Style-->
    <link rel="stylesheet" href="../CSS/blogsDetails.css">
</head>

<body class="bg-blog-2">


<!--Titre du quiz-->
<?php

/*Récupération de l'id*/
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    /*Requêste sql pour avoir les informations du blog*/
    $sql = "SELECT * FROM blogs WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $blog = $stmt->fetch();
    /*Changer le format de date*/
    $date = new DateTime($blog['date_publication']);
    $time = new DateTime($blog['date_publication']);
    $date = $date->format('d:m:Y');
    $time = $time->format('H');
    if ($blog) {
        // Titre du blog
        echo "
    <div class='center-blog bg-blog'>
        <div class='title-blog'>{$blog['title']}</div>
    </div>";

        // Image du blog
        echo "
    <div class='center-blog bg-blog-2 mt-blog'>
        <img class='img-details' src='../PICTURE/img-blog/{$blog['picture']}' alt='{$blog['title']}'/>
    </div>";

    // Date de publication
        echo "
    <div class='center-blog bg-blog-2 mt-blog column-blog '>
        <div class='mb-blog-2'> Publié le {$date} à {$time}h</div>
        <div class='line-blog'></div>
    </div>";

        // Description du blog
        echo "
    <div class='center-blog bg-blog-2 mt-blog mb-blog column-blog'>
        <div class='size-description mb-blog-2'>{$blog['description']}</div>
        <div class='line-blog'></div>
    </div>";
    }
}
?>



</body>

</html>
