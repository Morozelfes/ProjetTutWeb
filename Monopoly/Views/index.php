<?php
include_once('../Controller/Controller.class.php');
$controller = new Controller();

session_start();


$playerPseudo = $_SESSION['pseudo'];



//$playerPseudo = Controller::getUserInformation()['pseudo'];


$playerId = $controller->getMemberIdByPseudo($playerPseudo);



$playersCards = $controller->getCardByOwner($playerId);


?>
<head>
		<title>Mon Monopoly</title>
		<link href="styles.css" rel="stylesheet">
		<link href="assets/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	
	

<?php   include_once ('Navbar.php');
		include_once('mainView.php');?>


