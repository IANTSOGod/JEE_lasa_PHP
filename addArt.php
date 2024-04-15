<?php
$sujet = $_GET['sujet'];
$description = $_GET['desciption'];
$serveur = "localhost";
$utilisateur = "nouvel_utilisateur";
$motDePasse = "mot_de_passe";
$database = "blog";

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$database", $utilisateur, $motDePasse);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $requete = "INSERT INTO article (sujet,desciption,nb_jaime,nb_naime) VALUES (?,?,?,?)";
    $stmt = $connexion->prepare($requete);
    
    $stmt->execute([$sujet,$description,"0","0"]);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    include('content.php');
} catch(PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}

$connexion = null;
?>
