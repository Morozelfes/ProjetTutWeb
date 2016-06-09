<?php

session_start()
include_once('Controller.class.php');

$controller = new Controller();

if isset($_GET['propositions'])
	