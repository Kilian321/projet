<?php require_once "navbar.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Archéo-IT Contact</title>
    <meta charset="UTF-8">
    <link href="../CSS/contact.css" rel="stylesheet">
    <link rel="icon" href="../PICTURE/Archeo-IT_Logo-removebg-preview.png">
</head>
<body>
<header>
    <div class="form-container">
        <h2>Contactez-nous</h2>
        <form action="contact.php" method="post">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Envoyer</button>
        </form>
    </div>
</header>
</body>