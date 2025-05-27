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
    <div class="contactPage">
    <div class="form-container">
        <h2 class="ourInformation">Nos informations :</h2>
        <div class="informationBusiness">
            <p>Nom : Archéo-IT</p>
            <p>Email : archeoit.support@gmail.com</p>
            <p>Téléphone : 06 26 07 57 86</p>
            <img alt="pictureInformation" class="pictureInformation" src="../PICTURE/Karnak_Osiris-e1680105914334.jpg">
        </div>
    </div>
    <div class="informationContact">
        <h2 class="contactUS">Contactez-nous :</h2>
        <form action="contact.php" method="post">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <label for="file">Insérer un fichier : (Optionnel)</label>
            <input type="file" id="file" name="file">
            <div class="buttonSubmit">
            <button type="submit">Envoyer</button>
            </div>
        </form>
    </div>
    </div>
</header>
</body>