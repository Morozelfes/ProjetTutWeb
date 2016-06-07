<?php

class CarteDAO
{
	private static $INSTANCE;
	private $connection;
	
	private function getInstance()
	{
		if (self::$INSTANCE == null)
			self::$INSTANCE = new CarteDAO();
		return self::$INSTANCE;
	}
	
	private function __construct()
	{
		$username = 'root';
		$password = '';
		$path = 'mysql:dbname=monoply;host=localhost';
		
		try
		{
			$this->connection = new PDO($path,$username,$password);
		}
		catch(PDOException $e)
		{
			'Error: '.$e->getMessage();
		}
		
		
	}
	
	public function findAllCard()
	{
		$statement = $this->connection->prepare("SELECT * FROM carte ;");
		$statement->execute();
		
		$resultArray = $statement->fetchAll();
		
		return $resultArray;
	}
	
	public function findCardFromOwner($id)
	{
		$statement = $this->connection->prepare("SELECT * FROM carte WHERE id_membre = :id;");
		$statement->bindParam(':id',$id);
		$statement->execute();
		
		$resultArray = $statement->fetchAll();
		
		return $resultArray;
	}
	
	public function addCard($adresse,$membre)
	{
		$statement = $this->connection->prepare("INSERT INTO  carte (id_adresse,id_membre) VALUES (:idad,:idmem) ;");
		$statement->bindParam(':idad', $adresse);
		$statement->bindParam(':idmem', $membre);
		$statement->execute();
	}
	
	public function deleteCard($id)
	{
		$statement = $this->connection->prepare("DELETE FROM carte WHERE id_carte = :id;" )
		$statement->bindParam(':id',$id);
		$statement->execute();
	}
	
	public function findAllAdd()
	{
		$statement = $this->connection->prepare("SELECT * FROM adresse ;");
		$statement->execute();
		$resultArray = $statement->fetchAll();
		
		return $resultArray;
	}
	
	public function findAllDistrict()
	{
		$statement = $this->connection->prepare("SELECT * FROM quartier ;");
		$statement->execute();
		$resultArray = $statement->fetchAll();
		
		return $resultArray;
	}
	
	public function findDistrict($couleur)
	{
		$statement = $this->connection->prepare("SELECT * FROM quartier WHERE couleur = :couleur ;");
		$statement->bindParam(':couleur',$couleur);
		$statement->execute();
		$resultArray = $statement->fetchAll();
		
		return $resultArray;
	}	
	public function findAdd($id)
	{
		$statement = $this->connection->prepare("SELECT * FROM adresse  WHERE id_quartier = :id;");
		$statement->bindParam(':id',$id);
		$statement->execute();
		$resultArray = $statement->fetchAll();
		
		return $resultArray;
	}
	
	public function updateOwner($idtaker,$idcarte)
	{
		$statement = $this->connection->prepare("UPDATE  carte SET id_membre = :idmembre WHERE id_carte = :id;" )
		$statement->bindParam(':idmembre', $idtaker);
		$statement->bindParam(':idcarte',$idcarte);
		$statement->execute();
	}
	
	
}