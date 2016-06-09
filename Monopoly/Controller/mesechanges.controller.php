<?php

session_start();
include_once('Controller.class.php');

$controller = new Controller();
$playerPseudo = $_SESSION['pseudo'];
$playerId = $controller->getMemberIdByPseudo($playerPseudo);


if (isset($_GET['proposition']))
{
	$selectedPlayerId = $_GET['selected'];
	$mySelectedCardAdd = $_POST['selected-card1'];
	$otherSelectedCardAdd = $_POST['other-selected-card1'];
	
	$mySelectedCard = $controller->getCardByPlayerAndAddress($playerId, $mySelectedCardAdd);
	$otherSelectedCard = $controller->getCardByPlayerAndAddress($selectedPlayerId, $otherSelectedCardAdd);
	
	$controller->addTrade($playerId, $selectedPlayerId);
	$controller->addCardTrade($mySelectedCard, $otherSelectedCard);
}


$demandes = $controller->findTradePerso($playerId);

?>
<head>
		<title>Mon Monopoly</title>
		<link href="../Views/styles.css" rel="stylesheet">
		<link href="assets/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
<?php

include_once('../Views/Navbar.php');
include_once('../Views/mesechanges.php');
	
	