<?php
session_start();
require_once '../DATA-BASE/database.php';
require_once "navbar.php";
global $pdo;

?>

<?php
/*Affichage erreurs php*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
/*Le php de création de blog*/
if(!empty($_POST['title-blog']) && !empty($_POST['description-blog'])) {
    $titleBlog = htmlspecialchars($_POST['title-blog']);
    $descriptionBlog = htmlspecialchars($_POST['description-blog']);
    if (isset($_FILES["image-blog"]) && $_FILES["image-blog"]["error"] == 0) {
        // Déplacez le fichier vers le répertoire cible.
        move_uploaded_file($_FILES["image-blog"]["tmp_name"], "../PICTURE/img-blog/" . $_FILES["image-blog"]["name"]);
    }

    $sql = "INSERT INTO blogs (title,description,picture) VALUES (:title,:description,:picture)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':title' => $titleBlog, ':description' => $descriptionBlog, ':picture' => !empty($_FILES["image-blog"]["name"]) ? $_FILES["image-blog"]["name"] : ''));
    $pdo = null;
    echo '<div class="  center-form mt-form"> 
                          <div class="center-form box_green text_color-green animation">
                             Vous avez ajouté un blog avec succès !
                          </div> 
                      </div> ';
}
?>
<?php
/*Le php de création de chantier*/
if(!empty($_POST['title-chantier']) && !empty($_POST['description-chantier'])) {
    $titleChantier = htmlspecialchars($_POST['title-chantier']);
    $descriptionChantier = htmlspecialchars($_POST['description-chantier']);
    if (isset($_FILES["image-chantier"]) && $_FILES["image-chantier"]["error"] == 0) {
        // Déplacez le fichier vers le répertoire cible.
        move_uploaded_file($_FILES["image-chantier"]["tmp_name"], "../PICTURE/img-chantier/" . $_FILES["image-chantier"]["name"]);
    }

    $sql = "INSERT INTO constructionsites (title,description,picture) VALUES (:title,:description,:picture)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':title' => $titleChantier, ':description' => $descriptionChantier, ':picture' => !empty($_FILES["image-chantier"]["name"]) ? $_FILES["image-chantier"]["name"] : ''));
    $pdo = null;
    echo '<div class="  center-form mt-form"> 
                          <div class="center-form box_green text_color-green animation">
                             Vous avez ajouté un chantier avec succès !
                          </div> 
                      </div> ';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Archéo-IT Création de page</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../PICTURE/Archeo-IT_Logo-removebg-preview.png">
    <!--Style-->
    <link rel="stylesheet" href="../CSS/create_page.css">
</head>
<body class="bg">

<!--Place de la structure-->
<div class="mt-form center-form mb-form">
    <!--fond de la structure-->
    <div class="bg-form ">
        <!--onglet-->
        <div class="in-line">
            <!--onglet blog-->
            <div id="ongletBlog" class="title header-form border-left-0 radius-tl center-form">
                <!--Text-->
                <div class="">
                    Création de Blog
                </div>
            </div>
            <!--onglet chantier-->
            <div id="ongletChantier" class=" title header-form  border-left-0 border-right-0 radius-tr center-form">
                <!--Text-->
                <div class="" >
                    Création de Chantier
                </div>
            </div>
        </div>
        <!--Page blogs-->
        <div id="blog" class="mt-form center-form column">
            <!--Titre -->
            <div class="title-2 ">
                Crée un Blog :
            </div>
            <!--Formulaire-->
            <form method="post" enctype="multipart/form-data">
                <!--Bouton titre-->
                <div class="center-form mt-form">
                    <input  class="btn-title text-placeholder" type="text" name="title-blog" placeholder="Titre">
                </div>
                <!--Bouton description-->
                <div class="center-form mt-form">
                    <textarea  class="btn-description text-placeholder" type="text" name="description-blog" placeholder="Description"></textarea>
                </div>
                <!--Bouton image-->
                <div class="center-form mt-form">
                    <input  class="btn-image text-placeholder" type="file" name="image-blog">
                </div>
                <!--Bouton Valider-->
                <div class="center-form mt-form">
                    <button class="btn-submit title-3" type="submit">Valider</button>
                </div>
            </form>
        </div>
        <!--Page chantier-->
        <div id="chantier" class="hidden center-form mt-form column">
            <!--Titre -->
            <div class="title-2 ">
                Crée un Chantier :
            </div>
            <!--Formulaire-->
            <form method="post" enctype="multipart/form-data">
                <!--Bouton titre-->
                <div class="center-form mt-form">
                    <input  class="btn-title text-placeholder" type="text" name="title-chantier" placeholder="Titre">
                </div>
                <!--Bouton description-->
                <div class="center-form mt-form">
                    <textarea  class="btn-description text-placeholder" type="text" name="description-chantier" placeholder="Description"></textarea>
                </div>
                <!--Bouton image-->
                <div class="center-form mt-form">
                    <input  class="btn-image text-placeholder" type="file" name="image-chantier">
                </div>
                <!--Bouton Valider-->
                <div class="center-form mt-form">
                    <button class="btn-submit title-3" type="submit">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>

















<script src="../JS/create.js"></script>
</body>
</html>
