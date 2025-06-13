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
    if ($blog) {
        // Titre du blog
        echo "
    <div class='center-blog bg-blog'>
        <div class='title-blog'>{$blog['title']}</div>
    </div>";

        // Image du blog
        echo "
    <div class='center-blog bg-blog-2 mt-blog'>
        <img src='../PICTURE/img-blog/{$blog['picture']}' alt='{$blog['title']}' />
    </div>";
    }
}
?>



</body>

</html>
