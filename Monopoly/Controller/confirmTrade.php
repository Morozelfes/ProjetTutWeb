 <?php
include_once('Controller.class.php');
session_start();
$controller = new Controller();

$playerPseudo = $_SESSION['pseudo'];
$playerId = $controller->getMemberByPseudo($playerPseudo);

$demande = $_GET['idTrade'];

$controller->dealTrade($demande);

header('location: ../Views/index.php');
