<?php

include_once('models/CarteDAO.php');
include_once('models/MembreDAO.php');

class Controller
{
	
	private $cards;
	private $members;
		
	
	
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
			return MemberDAO::findMember($id);
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
			MemberDAO::getInstance()->addMember($name,$surname,$mail,$psw,$nick);
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
			MemberDAO::getInstance()->deleteMember($id);
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
			MemberDAO::getInstance()->updateMember($key, $value, $id);
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
			return MemberDAO::getInstance()->findAdmin();
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
			return CarteDAO::getInstance()->getCardFromOwner($idOwner);
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
	
	
	
	
	
	
	
	
}