<?php
// connection a la base de donnée des utilisateurs
$host = 'localhost';
$username = 'kilian';
$password = 'test';
$database = 'archeo-it';
$charset = 'utf8mb4';
// Options de connexion PDO
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
// Créer une connexion PDO
$dsn = "mysql:host=$host;dbname=$database;charset=$charset";
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>