<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>IBLOG</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
session_start();
	$_SESSION['servlet']="get";
	echo("<form method='get' action=servlet.php>");
?>
	<p class="textes">Username</p>
	<input type="text" name="username" required class="Input"><br>
	<p class="textes">Password</p>
	<input type="password" name="password" required class="Input"><br>
	Don't have an account ? Create one <a href="create_acccount.html" class="lien">here</a>
	<input type="submit" value="send" class="pseudo-bouton">
</form>
</body>
</html>