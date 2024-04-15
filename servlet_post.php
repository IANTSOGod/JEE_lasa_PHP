<?php
$username = $_POST['username'];
$mdp = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$adresse = $_POST['adress'];
$serveur = "localhost";
$utilisateur = "nouvel_utilisateur";
$motDePasse = "mot_de_passe";
$database = "blog";

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$database", $utilisateur, $motDePasse);
   $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $requete = "INSERT INTO utilsateurs (username,mdp,email,tel,adresse) VALUES (?,?,?,?,?)";
    $stmt = $connexion->prepare($requete);
    
    $stmt->execute([$username, $mdp,$email,$phone,$adresse]);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "Try login now";
    include('index.php');
} catch(PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}

$connexion = null;
?>