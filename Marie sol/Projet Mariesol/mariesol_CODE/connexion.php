<?php
// Paramètres de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mariesol";

try {
    // Connexion à la base de données MySQL via PDO
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configuration des attributs PDO pour générer des exceptions en cas d'erreur
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>