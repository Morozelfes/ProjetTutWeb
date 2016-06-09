<!DOCTYPE html>

<?php include '../models/include.php';
 ?>

<html lang="en">
  <head>
	<title>Monopoly - inscription</title>
	<link href="styles.css" rel="stylesheet" type="text/css">
	<link href="assets/bootstrap.css" rel="stylesheet">
  </head>
  
  <body class="login-body">
  
	
	<div class="container">
		
	
		<form role="form" class="inscription-form" autocomplete="off" method="post" action="../index.php?inscription=true">
			<?php
					if (isset($_GET['inscriptionMissing']))
						echo '<div class="alert-danger alert-danger-inscription"><h3>Il faut remplir tous les champs !</h3></div>';
					
					if (isset($_GET['mdp_notidentical']))
						echo '<div class="alert-danger alert-danger-inscription"><h3>Les champs "mot de passe" et "confirmer mot de passe" ne sont pas identiques</h3></div>';
					
					if (isset($_GET['validEmail']))
						echo '<div class="alert-danger alert-danger-inscription"><h3>Email deja utilise</h3></div>';
					
					if (isset($_GET['validPseudo']))
						echo '<div class="alert-danger alert-danger-inscription"><h3>Pseudo deja utilise</h3></div>';?>
		
			<div class="form-header"><h2 style="background-color:lightblue; padding:25px 20px">Inscrivez-vous !</h2></div>
			<div class="inside-form-inscription">
				<div class="form-group">
					<label for="lastname">Nom:</label>
					<input type="text" class="form-control" id="lastname" placeholder="Entrez votre nom" name="lastname">
				</div>
				<div class="form-group">
					<label for="firstname">Prenom:</label>
					<input type="text" class="form-control" id="firstname" placeholder="Entrez votre prenom" name="firstname">
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" placeholder="Entrez votre email" name="email">
				</div>
				<div class="form-group">
					<label for="pseudo">Pseudo:</label>
					<input type="text" class="form-control" id="pseudo" placeholder="Entrez un pseudo" name="pseudo">
				</div>
				<div class="form-group">
					<label for="mdp">Mot de passe:</label>
					<input type="password" class="form-control" id="mdp" placeholder="Entrez un mot de passe" name="mdp">
				</div>
				<div class="form-group">
					<label for="confirm_mdp">Confirmer mot de passe:</label>
					<input type="password" class="form-control" id="confirm_mdp" placeholder="Confirmer mot de passe" name="confirm_mdp">
				</div>
				
				<button type="submit" class="btn btn-default">Valider</button>
				<button type="submit" class="btn btn-default">Annuler</button>
				
				
			</div>
		</form>
		
	</div>
	
	</body>
  
  
  