<?php

session_start();
include('/controller.class.php');

$controller = new Controller();

$playerPseudo = $_SESSION['pseudo'];
$playerId = $controller->getMemberIdByPseudo($playerPseudo);

$playerCards = $controller->getCardByOwner($playerId);

$players = $controller->getMembers();

if(isset($_GET['playerselect']))
{
	$selectedPlayerPseudo = $_POST['my-selection'];
	$selectedPlayerId = $controller->getMemberIdByPseudo($selectedPlayerPseudo);
	$selectedPlayersCards = $controller->getCardByOwner($selectedPlayerId);
}
	

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

//include_once('../Views/Navbar.php');
include_once('../Views/echanges.php');
