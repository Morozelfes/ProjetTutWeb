<?php

include('../models/CarteDAO.php');
include('../models/MemberDAO.php');

class Controller
{
	
	private static $INSTANCE;
	
	private $cards;
	private $members;
		
		
	public static function getInstance()
	{
		if (self::$INSTANCE == null)
			self::$INSTANCE = new Controller();
		return self::$INSTANCE;
	}
	
	
	private function __construct()
	{
		$this->updateData();
	}
	
	public function updateData()
	{
		$this->cards = CarteDAO::getInstance()->findAll();
		$this->members = MemberDAO::getInstance()->findAll();
	}
	
	
	
	
	
}