<?php
include_once('Controller/Controller.class.php');
$playerPseudo = $_SESSION['pseudo'];
$playerId = $controller->getMemberIdByPseudo($playerPseudo);

$controller = new Controller();
$playersCards = $controller->getCardByOwner($playerId);
$displayStrings = array();




header('location: Views/mainView.php');


