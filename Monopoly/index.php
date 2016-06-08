<!DOCTYPE html>
<?php
	include_once 'models/sessions.php';
	include_once 'Controller/Controller.class.php';
	$controller = new Controller();
	
	$missing = false;
	$mistake = false;
	$inscriptionMissing = false;
	$mdp_notidentical = false;
	$validEmail = true;
	$validPseudo = true;
	
	if(isset($_GET['connection']))
	{
			if(		(isset($_POST['mdp']) and !empty($_POST['mdp']))	 AND	 (isset($_POST['pseudo']) and !empty($_POST['pseudo']))	)
			{
				$pseudo = $_POST['pseudo'];
				$mdp = $_POST['mdp'];
				if($controller->validConnection($pseudo, $mdp) == false)
					echo $mistake = true;
				else
				{
					$_SESSION['pseudo'] = $pseudo;
					$_SESSION['mdp'] = $mdp;
				}
			
			}
			else
			{
				$missing = true;
			}		
				
	}
	
	
	if(isset($_GET['inscription']))
	{
		
		if(!isset($_POST['lastname']) or empty($_POST['lastname']))
			$inscriptionMissing = true;
		if(!isset($_POST['firstname']) or empty($_POST['firstname']))
			$inscriptionMissing = true;
		if(!isset($_POST['email']) or empty($_POST['email']))
			$inscriptionMissing = true;
		if(!isset($_POST['pseudo']) or empty($_POST['pseudo']))
			$inscriptionMissing = true;
		if(!isset($_POST['mdp']) or empty($_POST['mdp']))
			$inscriptionMissing = true;
		if(!isset($_POST['confirm_mdp']) or empty($_POST['confirm_mdp']))
			$inscriptionMissing = true;
		
		if(!$inscriptionMissing)
		{
			if(($_POST['mdp']) != ($_POST['confirm_mdp']))
				$mdp_notidentical = true;
			if (!$connection->validEmail($_POST['email']))
				$validEmail = false;
			if (!$connection->validPseudo($_POST['email']))
				$validPseudo = false;
		}
		
		if($inscriptionMissing)
			header('location: Views/Inscription.php?insciptionMissing=true');
		elseif($mdp_notidentical)
			header('location: Views/Inscription.php?mdp_notidentical=true');
		elseif(!$validEmail)
			header('location: Views/Inscription.php?validEmail=false');
		elseif(!$validPseudo)
			header('location: Views/Inscription.php?validPseudo=false');
		
		else
		{
			$_SESSION['pseudo'] = $_POST['pseudo'];
			$_SESSION['mdp'] = $_POST['mdp'];
		}	
	}
	
	
	
	if(!loggedIn())
	{

		if($mistake)
			header('location: Views/Connection.php?mistake=true');
		
		elseif($missing)
			header('location: Views/Connection.php?missing=true');
		
		else 
			header('location: Views/Connection.php');
		
		exit(0);
	}
	
	
			
		
?>
	
	
	
	


	