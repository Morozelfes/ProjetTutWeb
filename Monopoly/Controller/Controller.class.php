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
		$this->cards = CarteDAO::getInstance()->findAllAdd();
		$this->members = MemberDAO::getInstance()->findAllMember();
	}
	
	public 
	
	//     MEMBER FUNCTIONS -- INTERACTION WITH DATABASE
	
	public function getMember()
	{
		if(isset $this->members)
			return $members;
		else
			echo 'Ton getmember marche pas sous-merde';
			return false;
	}
	
	public function getMember($id)
	{
		try
		{
			return MemberDAO::findMember($id);
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
	}
	
	
	public function addMember($name,$surname,$mail,$psw,$nick,$adm)
	{
		try
		{
			MemberDAO::addMember($name,$surname,$mail,$psw,$nick,$adm);
			$this->updateData();
			return true;
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}

	}
	
	public function deleteMember($id)
	{		
		try
		{
			MemberDAO::deleteMember($id);
			$this->updateData();
			return true;
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}		
	}
	
	
	public function updateMember($key, $value, $id)
	{
		try
		{
			MemberDAO::updateMember($key, $value, $id);
			$this->updateData();
			return true;
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}	
	}
	
	
	
	public function admins()
	{
		try
		{
			return MemberDAO::findAdmin();
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
	}
	
	public function validConnection()
	{
		try
		{
			if (MemberDAO::testConnection == 1)
				return true;
			else
				return false;
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
		}
	}
	
	
	
	// CARD FUNCTIONS -- INTERACTION WITH DATABASE
	
	
	public function getCard()
	{
		if (isset $cards)
			return $cards;
		else
		{
			echo 'ton getCard marche pas sous merde';
			return false;
		}
		//RETOURNE TABLEAU DE TOUTES LES CARTES OU FALSE.
	}
	
	
	public function getCard($idOwner);
	{
		try
		{
			return CarteDAO::getCardFromOwner($idOwner);
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
		//SURCHARGE DE LA FONCTION PRECEDENTE. RETOURNE TABLEAU DE CARTES APPARTENANT AU JOUEUR.
	}
	
	public function addCard($adresse,$membre)
	{
		try
		{
			CarteDAO::addCard($adresse,$membre);
			return true;
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
		// A APPELLER SI UN JOUEUR EST AJOUTE OU EN CAS D ACHAT
	}
	
	
	
	
	
	
	
	
	
	
}