<?php
$aime=$_POST['aime'];
$naime=$_POST['naime'];
$serveur = "localhost";
$utilisateur = "nouvel_utilisateur";
$motDePasse = "mot_de_passe";
$database = "blog";

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$database", $utilisateur, $motDePasse);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($aime!=""){
        $requete = "UPDATE article set nb_jaime=nb_jaime+1 where id='".$aime."'";
    }
    else{
        $requete = "UPDATE article set nb_naime=nb_naime+1 where id='".$naime."'";
    }
    $stmt = $connexion->prepare($requete);
    
    $stmt->execute();
    
    include('content.php');
} catch(PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}

$connexion = null;
?>
