<?php
session_start();
ini_set('display_errors', E_ALL);
error_reporting(E_ALL);
require_once "navbar.php";
require_once '../DATA-BASE/database.php';
global $pdo;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Archéo-IT Accueil</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../PICTURE/Archeo-IT_Logo-removebg-preview.png">
    <link href="../CSS/home.css" rel="stylesheet">
    <link href="../CSS/ourDiscoveries.css" rel="stylesheet">
</head>

<?php if(!empty($_SESSION['user'])): ?>
<h2>Bonjour <?= $_SESSION['user']['email']; ?></h2>
<?php endif; ?>
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
        <h1 class="title">Les dernières actualités :</h1>
    </div>
</section>
<main>
    <section class="blogs-carousel">
        <div class="blogs-container">
            <div class="blogs-bloc">
                <?php
                $sql = "SELECT * FROM blogs"; // votre requete sql
                $result = $pdo->query($sql);
                foreach($result as $row):
                    $date = new DateTime($row['date_publication']);
                    $date = $date->format('d/m/Y');

                    ?>
                    <div class="blogs-item">
                        <img src="../PICTURE/img-blog/<?= $row['picture']?>" alt="<?= $row['title']?>">
                        <p class="blogs-date">Publié le <?=$date?></p>
                        <p class="blogs-title"><?= ($row['title']); ?></p>
                        <!--Bouton vers la page de détail-->
                        <div class="moreDetails">
                            <form action="blogsDetails.php" method="get">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" class="moreDetailsText">
                                    En savoir plus
                                </button>
                            </form>
                        </div>

                    </div>

                <?php
                endforeach;
                ?>

            </div>
        </div>
    </section>
</main>
<div>
    <h1 class="title">Qui sommes nous ?</h1>
</div>
<div class="containerWhoWeAre">
    <div class="content">
        <div class="block">
            <h2 class="blockTitle">Qui sommes-nous ?</h2>
            <p>Nous sommes une entreprise passionné dédié à l'exploration du passé et à la redécouverte des civilisations oubliées.</p>
            <p>Fondée par une équipe de chercheurs, d'explorateurs et d'amoureux de l'histoire, notre mission est de mettre en lumière les vestiges du temps à travers des fouilles, des études et des restitutions précises.</p>
        </div>
        <div class="block">
            <h2 class="blockTitle">Notre approche</h2>
            <p>Chez Archéo-IT, nous croyons que chaque fragment de poterie, chaque inscription effacée et chaque ruine enfouie racontent une histoire.<br> Notre travail s'articule autour de méthodes rigoureuses :</p>
            <p>Fouilles de terrain : Des sites antiques aux cités médiévales, nous menons des explorations en collaboration avec des institutions scientifiques.<br>

                Analyse et datation : Grâce aux technologies modernes comme le carbone 14 et l'imagerie 3D, nous redonnons vie aux artefacts.<br>

                Valorisation du patrimoine : Nous participons à la préservation des découvertes et leur diffusion auprès du grand public.</p>
        </div>
        <div class="block">
            <h2 class="blockTitle">Notre équipe</h2>
            <p>Notre groupe est composé d'archéologues chevronnés, d'historiens spécialisés, et de passionnés du patrimoine. Ensemble, nous cherchons à percer les mystères du passé et à partager nos découvertes via conférences, expositions et publications.</p>
        </div>
        <div class="block">
            <h2 class="blockTitle">Nous rejoindre</h2>
            <p>Vous êtes fasciné par les civilisations anciennes et souhaitez contribuer ? Que vous soyez étudiant, chercheur ou amateur éclairé. Archéo-IT est peût-être fait pour vous! Envoyer nous un message <a href="contact.php">ici</a>.</p>
        </div>
    </div>
</div>
    <script src="../JS/home.js"></script>
    <?php
        require_once "footerPolicy.php";
    ?>
</body>
</html>