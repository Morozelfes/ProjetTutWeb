<?php
$PROJECT_FILE = dirname(__FILE__).'/';

include_once($PROJECT_FILE.'../models/CarteDAO.php');
include_once($PROJECT_FILE.'../models/MembreDAO.php');

class Controller
{
	
	private $cards;
	private $members;
	
	private static $member;
	
	
	
	public function setUserInformation($pseudo)
	{
		
		self::$member = $this->getMemberByPseudo($pseudo);
	}
	
	public static function getUserInformation()
	{
		return self::$member;
	}
	
	
	public function __construct()
	{
		$this->updateData();
	}
	
	public function updateData()
	{
		$this->cards = CarteDAO::getInstance()->findAllCard();
		$this->members = MembreDAO::getInstance()->findAllMember();
	}
	
	
	//     MEMBER FUNCTIONS -- INTERACTION WITH DATABASE
	
	public function getMembers()
	{
		if(isset ($this->members))
			return ($this->members);
		else
		{
			echo 'Ton getmember marche pas sous-merde';
			return false;
		}	
	}
	
	public function getMemberById($id)
	{
		try
		{
			return MembreDAO::getInstance()->findMember($id);
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
	}
	
	
	public function getMemberByPseudo($pseudo)
	{
		try
		{
			return MembreDAO::getInstance()->findMemberByPseudo($pseudo);
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
	}
	
	
	
	public function addMember($name,$surname,$mail,$psw,$nick)
	{
		try
		{
			MembreDAO::getInstance()->addMember($name,$surname,$mail,$psw,$nick);
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
			MembreDAO::getInstance()->deleteMember($id);
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
			MembreDAO::getInstance()->updateMember($key, $value, $id);
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
			return MembreDAO::getInstance()->findAdmin();
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
	}
	
	public function validConnection($pseudo, $mdp)
	{
		try
		{
			if (MembreDAO::getInstance()->testConnexion($pseudo, $mdp) == 1)
				return true;
			else
				return false;
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
		}
	}
	
	public function validEmail($email)
	{
		try
		{
			if (MembreDAO::getInstance()->testMail($email) == 1)
				return false;
			else
				return true;
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
		}
	}
	
	public function validPseudo($pseudo)
	{
		try
		{
			if (MembreDAO::getInstance()->testPseudo($pseudo) == 1)
				return false;
			else
				return true;
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
		}
	}
	
	
	
	
	
	// CARD FUNCTIONS -- INTERACTION WITH DATABASE
	
	
	public function getCard()
	{
		if (isset ($this->cards))
			return $this->cards;
		else
		{
			echo 'ton getCard marche pas sous merde';
			return false;
		}
		//RETOURNE TABLEAU DE TOUTES LES CARTES OU FALSE.
	}
	
	
	public function getCardByOwner($idOwner)
	{
		try
		{
			return CarteDAO::getInstance()->findCardFromOwner($idOwner);
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
	}
	
	public function addCard($adresse,$membre)
	{
		try
		{
			CarteDAO::getInstance()->addCard($adresse,$membre);
			return true;
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
		// A APPELLER SI UN JOUEUR EST AJOUTE OU EN CAS D ACHAT, DE GAINS, ...
	}
	
	public function deleteCard($id)
	{
		try
		{
			CarteDAO::getInstance()->deleteCard($id);
			return true;
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
		// A APPELLER EN CAS DE SUPPRESSION DE JOUEUR
	}
	
	
	public function addresses()
	{
		try
		{
			return CarteDAO::getInstance()->findAllAdd();
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
	}
	
	public function districts()
	{
		try
		{
			return CarteDAO::getInstance()->findAllDistrict();
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
	}
	
	public function getAddressesByDistrict($idDistrict)
	{
		try
		{
			return CarteDAO::getInstance()->findAdd($idDistrict);
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
	}
	
	public function getAddressesByColor($color)
	{
		$color = strtolower($color);
		
		try
		{
			$id = CarteDAO::getInstance()->getDisctrictByColor($color);
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
		
		return $this->getAddressesByDistrict($id);
		
	}
	
	public function updateOwner($idtaker, $idCard)
	{
		try
		{
			CarteDAO::getInstance()->updateOwner($idtaker, $idCard);
			return true;
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
	}
	
	
	public function getAdressById($id)
	{
		try
		{
			return CarteDAO::getInstance()->getAdressById($id);
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
		
	}
	
	
	public function getAddNameById($id)
	{
		try
		{
			return CarteDAO::getInstance()->getAddNameById($id);
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
		
	}
	
	public function getColorByCardId($id)
	{
		try
		{
			return CarteDAO::getInstance()->getColorById($id);
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
			return false;
		}
		
	}
	
	public function getMemberIdByPseudo($pseudo)
	{
		try
		{
			return MembreDAO::getInstance()->getMemberIdByPseudo($pseudo);
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
		}
	}
	
	
	
	
	
	
}