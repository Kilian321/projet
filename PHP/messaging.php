<?php
session_start();
require_once "navbar.php";
require_once '../DATA-BASE/database.php'; global $pdo;

$sql = "SELECT last_name, first_name, email, menu, message, created_at FROM forms ORDER BY created_at DESC";
$stmt = $pdo->query($sql);

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Archéo-IT Messagerie</title>
        <meta charset="UTF-8">
        <link rel="icon" href="../PICTURE/Archeo-IT_Logo-removebg-preview.png">
        <link href="../CSS/messaging.css" rel="stylesheet">
    </head>

    <div class="chat-container">
        <h2>Messagerie :</h2>
        <div class="chat-box">
            <?php while ($row = $stmt->fetch()) {
                $date = new DateTime($row['created_at']);
                $date = $date->format('d/m/Y H:i');
                ?>
                <div class="message">
                    <div>
                        <strong><?= htmlspecialchars($row['email']); ?></strong>
                    </div>
                    <div>
                        <?= htmlspecialchars($row['last_name']) ?> <?= htmlspecialchars($row['first_name']) ?>
                    </div>
                    <span class="date"><?=$date?></span>
                    <p class="messageText"><?= nl2br(htmlspecialchars($row['message'])) ?></p>
                </div>
            <?php } ?>
        </div>
    </div>

</html>
