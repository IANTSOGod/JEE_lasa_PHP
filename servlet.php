<?php
$username = $_GET['username'];
$mdp = $_GET['password'];
$serveur = "localhost";
$utilisateur = "nouvel_utilisateur";
$motDePasse = "mot_de_passe";
$database = "blog";

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$database", $utilisateur, $motDePasse);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $requete = "SELECT username, mdp FROM utilsateurs WHERE username=? AND mdp=?";
    $stmt = $connexion->prepare($requete);
    
    $stmt->execute([$username, $mdp]);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        include('content.php');
    } else {
        echo "Login failed, Try again";
        include('index.php');
    }
} catch(PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}

$connexion = null;
?>
