<?php
// Paramètres de connexion
$host = "mysql_container"; // Nom du service MySQL dans Docker Compose
$port = "3306";
$dbname = "db_task";
$username = "root";
$password = "root"; // Mot de passe root défini dans votre Dockerfile

try {
    // Connexion à la base de données
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    
    // Configuration des options de PDO pour afficher les erreurs PDOException
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Autres configurations éventuelles (ex. jeu de caractères)
    // $conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
    
    // Vous pouvez maintenant exécuter des requêtes SQL avec cet objet $conn
} catch(PDOException $e) {
    // En cas d'erreur de connexion, affichez un message d'erreur
    die("Error: " . $e->getMessage());
}
?>
