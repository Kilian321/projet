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
    <!--Style-->
    <link rel="stylesheet" href="../CSS/blogsDetails.css">
</head>

<body class="bg-blog-2">
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
    $date = $date->format('d/m/Y');
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
        <div class='mb-blog-2 size-date'> Publié le {$date} à {$time}h</div>
        <div class='line-blog'></div>
    </div>";

        // Description du blog
        echo "
    <div class='center-blog bg-blog-2 mt-blog mb-blog column-blog'>
        <div class='size-description mb-blog-2'>{$blog['description']}</div>
        <div class='line-blog'></div>
    </div>";

        // Messsage
        echo "
    <div class='center-blog bg-blog-2 mt-blog column-blog '>
        <div class='mb-blog-2 size-date'>Nos lecteurs ont lu ensuite</div>
    </div>";

    }
}
?>
<div class="in-line-details">
    <!--Si on est connecté-->
    <?php if(!empty($_SESSION['user'])): ?>
    <?php
    $sql = "SELECT DISTINCT * FROM blogs ORDER BY RAND() LIMIT 2";
    $result = $pdo->query($sql);
    foreach($result as $row):
        $date = new DateTime($row['date_publication']);
        $date = $date->format('d/m/Y');

        ?>
        <div class="center-blog">
            <!--fond de la carte blog-->
            <div class="bg-blog-details">
                <!--image-->
                <div class="center-blog mt-card">
                    <img class="img-details-2" src="../PICTURE/img-blog/<?= $row['picture']?>" alt="<?= $row['title']?>">
                </div>
                <!--Date de publication-->
                <div class="center-blog mt-card">
                    <p class="bloc-publiation center-blog">Publié le <?=$date?></p>
                </div>
                <!--Titre-->
                <div class="center-blog mt-card">
                    <p class="bloc-title center-blog"><?= ($row['title']); ?></p>
                </div>
                <!--Bouton vers la page de détail-->
                <div class="center-blog">
                    <form action="blogsDetails.php" method="get">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" class="bg-more-details bloc-more-details">
                            <div class="size-more-description">
                                En savoir plus
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    endforeach;
    endif;
    ?>
    <!--Si on n'est pas connecté-->
    <?php if(empty($_SESSION['user'])): ?>
        <?php
        $sql = "SELECT DISTINCT * FROM blogs ORDER BY  date_publication DESC LIMIT 2";
        $result = $pdo->query($sql);
        foreach($result as $row):
            $date = new DateTime($row['date_publication']);
            $date = $date->format('d/m/Y');

        ?>
            <div class="center-blog">
                <!--fond de la carte blog-->
                <div class="bg-blog-details">
                    <!--image-->
                    <div class="center-blog mt-card">
                        <img class="img-details-2" src="../PICTURE/img-blog/<?= $row['picture']?>" alt="<?= $row['title']?>">
                    </div>
                    <!--Date de publication-->
                    <div class="center-blog mt-card">
                        <p class="bloc-publiation center-blog">Publié le <?=$date?></p>
                    </div>
                    <!--Titre-->
                    <div class="center-blog mt-card">
                        <p class="bloc-title center-blog"><?= ($row['title']); ?></p>
                    </div>
                    <!--Bouton vers la page de détail-->
                    <div class="center-blog">
                        <form action="blogsDetails.php" method="get">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" class="bg-more-details bloc-more-details">
                                <div class="size-more-description">
                                    En savoir plus
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
    ?>
</div>
<?php require_once "footerPolicy.php"; ?>
</body>
</html>
