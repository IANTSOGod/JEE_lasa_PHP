<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<form method='get' action="addArt.php">
	<p class="textes">Sujet</p>
	<input type="text" name="sujet" required class="Input"><br>
	<p class="textes">Desciption</p>
	<input type="text" name="desciption" required class="Input"><br>
	<input type="submit" value="Publier" class="pseudo-bouton">
</form>
<div class="container">
        <table class="article-table">
            <tr>
                <th>Sujet</th>
                <th>Description</th>
                <th>Nb J'aime</th>
                <th>Nb Deteste</th>
            </tr>
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
$requete = "SELECT * FROM article";
$stmt = $connexion->prepare($requete);

$stmt->execute();

while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>
    <td>".$result['sujet']."</td>
    <td>".$result['desciption']."</td>
    <td>".$result['nb_jaime']."
        <form method='post' action='servlet_1.php'>
            <input type='hidden' name='aime' value='".$result['id']."'>
            <input type='submit' value='+' class='like-button'>
        </form>
    </td>
    <td>".$result['nb_naime']."
        <form method='post' action='servlet_1.php'>
            <input type='hidden' name='naime' value='".$result['id']."'>
            <input type='submit' value='-' class='dislike-button'>
        </form>
    </td>
</tr>";
}

} catch(PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}

$connexion = null;
?>

    </table>
    </div></body>
</html>