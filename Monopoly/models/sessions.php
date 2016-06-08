<?php session_start();



function loggedIn()
{
	if(isset($_SESSION['pseudo']) AND isset($_SESSION['mdp']))
	{
		return true;
	}
	else
	{
		unset($_SESSION['pseudo']);
		unset($_SESSION['mdp']);
		return false;
	}
}

?>