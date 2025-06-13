<?php
session_start();
require_once '../DATA-BASE/database.php';
global $pdo;
require_once "navbar.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Archéo-IT Détails</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../PICTURE/Archeo-IT_Logo-removebg-preview.png">
</head>

<body>


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
        /*Affiche le titre du blog*/
        echo  "<div class=''>
                  <h1 class=''>Le blog : " . $blog['title'] . "</h1>
              </div>";

    }
}
?>
</body>

</html>
