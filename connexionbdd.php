<?php
// Paramètres de connexion à la base de données
$host = 'localhost';       // Hôte de la base de données
$dbname = 'campingmaouzeteixeiramacedo'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur
$password = '';  // Mot de passe

// Options PDO pour la gestion des erreurs et des exceptions
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // active le mode d'erreur 'exception'
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // définit le mode de récupération par défaut
    PDO::ATTR_EMULATE_PREPARES => false, // désactive l'émulation des requêtes préparées
];

// Création de l'instance PDO
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, $options);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données: ' . $e->getMessage());
}

?>