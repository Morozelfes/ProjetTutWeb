<?php


function sessionStarted()
{
	return ((isset($_SESSION['session_id']))&&(isset($_SESSION['session_password'])))
}

