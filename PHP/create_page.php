<?php
session_start();
require_once "navbar.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Archéo-IT Création de page</title>
    <meta charset="UTF-8">
    <link rel="icon" href="../PICTURE/Archeo-IT_Logo-removebg-preview.png">
</head>

<?php if(!empty($_SESSION['user'])): ?>
    <h2>Bonjour <?= $_SESSION['user']['email']; ?></h2>
<?php endif; ?>
<form>
    <div id="editor"></div>
    <input type="submit">
</form>
</html>
