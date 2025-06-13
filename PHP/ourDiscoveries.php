<?php
session_start();
require_once "navbar.php";
require_once '../DATA-BASE/database.php';
global $pdo;
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Archéo-IT Découvertes</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../PICTURE/Archeo-IT_Logo-removebg-preview.png">
    <link href="../CSS/ourDiscoveries.css" rel="stylesheet">
</head>
<body>
<header>
    <div class="slider-container">
        <div class="slider">
            <div class="card">
                <img src="../PICTURE/SLIDE/istockphoto-166266622-612x612.jpg" alt="Image 1">
            </div>
            <div class="card">
                <img src="../PICTURE/SLIDE/istockphoto-505753284-612x612.jpg" alt="Image 2">
            </div>
            <div class="card">
                <img src="../PICTURE/SLIDE/istockphoto-1312318034-612x612.jpg" alt="Image 3">
            </div>
            <div class="card">
                <img src="../PICTURE/SLIDE/istockphoto-1382128751-612x612.jpg" alt="Image 4">
            </div>
            <div class="card">
                <img src="../PICTURE/SLIDE/istockphoto-1383516669-612x612.jpg" alt="Image 5">
            </div>
            <div class="card">
                <img src="../PICTURE/SLIDE/istockphoto-1725922723-612x612.jpg" alt="Image 6">
            </div>
            <div class="card">
                <img src="../PICTURE/SLIDE/istockphoto-1472042747-612x612.jpg" alt="Image 7">
            </div>
        </div>
        <button class="previousNext prev"><</button>
        <button class="previousNext next">></button>
    </div>
</header>
<section>
    <div>
        <h1 class="title">Les derniers chantiers :</h1>
    </div>
</section>
<main>
    <section class="constructionSites-carousel">
        <div class="constructionSites-bloc">
            <div class="constructionSites-bloc">
                <?php
                $sql = "SELECT * FROM constructionsites"; // votre requete sql
                $result = $pdo->query($sql);
                foreach($result as $row):

                    ?>
                    <div class="constructionSites-item">
                        <img src="../PICTURE/img-chantier/<?= $row['picture']?>" alt="<?= $row['title']?>">
                        <p class="constructionSites-date"><?= (substr($row['date_publication'],0,10)); ?></p>
                        <p class="constructionSites-title"><?= ($row['title']); ?></p>
                        <p class="constructionSites-description"><?= ($row['description']); ?></p>
                    </div>

                <?php
                endforeach;
                ?>

            </div>
        </div>
    </section>
</main>
<script src="../JS/home.js"></script>
<?php
require_once "footerPolicy.php";
?>
</body>
</html>
