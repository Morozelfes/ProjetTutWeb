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
  
	
		
	<div class="login-form">
		<div class="form-header"><h2>Ici la case depart!</h2></div>
		<div class="inside-form">
			<form role="form" autocomplete="off" method="post" action="../index.php?connection=true">
				<?php 	if(isset($_GET['mistake']))
							echo '<div class="alert-danger-login"><h3>Pseudo ou mot de passe incorrect, reessayez !</h3></div>';
		
						if(isset($_GET['missing']))
							echo '<div class="alert-danger-login"><h3>Il faut remplir tous les champs !</h3></div>';?>
						
				
				<div class="inside-form">
					<div class="form-group">
						<label for="pseudo">Pseudo:</label>
						<input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo">
					</div>
					<div class="form-group">
						<label for="mdp">Mot de passe:</label>
						<input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrez votre mot de passe">
					</div>
					<div class="checkbox">
						<label><input type="checkbox">Se souvenir de moi</label>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<button type="submit" class="btn btn-default">Valider</button>
						</div>
						<div class="col-sm-6">
						</div>
						<div class="col-sm-3">
							<a href="Inscription.php">Inscription</a>
						</div>
					</div>
				</div>
		
			</form>
		</div>
	</div>
		
	</div>
	</body>
	
</html>