<?php require_once "navbar.php"; ?>
<?php
session_start();
require_once "navbar.php"; ?>
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
            <p>Téléphone : 06 26 37 42 95</p>
            <img alt="pictureInformation" class="pictureInformation" src="../PICTURE/Karnak_Osiris-e1680105914334.jpg">
        </div>
    </div>
    <div class="informationContact">
        <h2 class="contactUS">Contactez-nous :</h2>
        <?php require_once '../DATA-BASE/database.php'; global $pdo;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["contactBtn"])) {
                $nom = $_POST["last_name"];
                $prenom = $_POST["first_name"];
                $email = $_POST["email"];
                $menu = $_POST["menu"];
                $menuStatus = 1;
                switch ($menu) {
                    case "Demande d'informations": $menuStatus = 0; break;
                    case "Demande de rendez-vous": $menuStatus = 1; break;
                    case "Autre": $menuStatus = 2; break;
                }
                $message = $_POST["message"];

                $sql = "INSERT INTO formulaire (last_name, first_name, email, menu, message) VALUES (:last_name, :first_name, :email, :menu, :message)";
                $stmt = $pdo->prepare($sql);

                // Associer les valeurs et exécuter la requête
                $stmt->execute([
                    ':last_name' => $nom,
                    ':first_name' => $prenom,
                    ':email' => $email,
                    ':menu' => $menuStatus,
                    ':message' => $message
                ]);

                echo "Votre demande a bien été enregistrée.";
            }
        }


        ?>
        <form action="contact.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="" name="last_name" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="first_name" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="menu">Sujet :</label>
            <select id="menu" name="menu" required>
                <option value="" disabled selected>-- Sélectionnez une option --</option>
                <option value="information">Demande d’informations</option>
                <option value="appointment">Demande de Rendez-vous</option>
                <option value="Other">Autre</option>
            </select>

            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <div class="buttonSubmit">
            <button type="submit" name="contactBtn">Envoyer</button>
            </div>
        </form>
    </div>
    </div>
</header>
</body>