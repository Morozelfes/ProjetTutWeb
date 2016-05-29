<!DOCTYPE html>

<?php include '../models/include.php';
 ?>

<html lang="en">
  <head>
	<title>Monopoly - connexion</title>
	<link href="styles.css" rel="stylesheet">
	<link href="assets/bootstrap.css" rel="stylesheet">
  </head>
  
  <body class="login-body">
	
	<div class="container">
		<form role="form" class="login-form" autocomplete="off" method="post">
			<h2 style="background-color:lightblue; padding:25px 20px">Ici la case depart!</h2>
			<div class="form-group">
				<label for="pseudo">Pseudo:</label>
				<input type="text" class="form-control" id="pseudo" placeholder="Entrez votre pseudo">
			</div>
			<div class="form-group">
				<label for="mdp">Mot de passe:</label>
				<input type="password" class="form-control" id="mdp" placeholder="Entrez votre mot de passe">
			</div>
			<div class="checkbox">
				<label><input type="checkbox">Se souvenir de moi</label>
			</div>
			<button type="submit" class="btn btn-default">Valider</button>
			<button type="submit" class="btn btn-default">S'inscrire</button>
		</form>
	</div>
	</body>
	
</html>