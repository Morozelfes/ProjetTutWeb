<?php

class TradeDAO
{
	private static $INSTANCE;
	private $connection;
	
	public static function getInstance()
	{
		if (self::$INSTANCE == null)
			self::$INSTANCE = new TradeDAO();
		return self::$INSTANCE;
	}
	
	private function __construct()
	{
		$username = 'root';
		$password = '';
		$path = 'mysql:dbname=monopoly;host=localhost';
		
		try
		{
			$this->connection = new PDO($path,$username,$password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			die('Error: '.$e->getMessage());
		}
		
		
	}
	public function findAllTrade()
	{
		$statement = $this->connection->prepare("SELECT * FROM echange ;");
		$statement->execute();
		
		$resultArray = $statement->fetchAll();
		
		return $resultArray;
	}
	
	
	public function findTrade($id)
	{
		$statement = $this->connection->prepare("SELECT * FROM echange WHERE id_trade = :id ;");
		$statement->bindParam(':id', $id);
		$statement->execute();
		
		$resultArray = $statement->fetch();
		
		return $resultArray;
	}
	
	
	public function addTrade($id_membre,$id_receveur)
	{
		$statement = $this->connection->prepare("INSERT INTO  echange (id_membre,id_receveur,confirmed) VALUES (:membre, :receveur,0) ;");
		$statement->bindParam(':membre', $id_membre);
		$statement->bindParam(':receveur', $id_receveur);
		$statement->execute();
		
		
	}
	
	public function findTradePerso($id)
	{
		$statement = $this->connection->prepare("SELECT * FROM echange WHERE id_receveur = :id ;");
		$statement->bindParam(':id',$id);
		$statement->execute();
		
		$resultArray = $statement->fetchAll();
		
		return $resultArray;
	}
	
	public function lastTrade()
	{
		$statement = $this->connection->prepare("SELECT id_trade FROM echange ORDER BY id_trade DESC LIMIT 1;");
		$statement->execute();
		$lastInsertId = $statement->fetch();
		return intval($lastInsertId['id_trade']);
	}
	
	public function addCarteEchange($id_carteDemande,$id_CarteOffre)
	{
		$id_carteDemande = intval($id_carteDemande);
		$id_CarteOffre = intval($id_CarteOffre);
		
		$trade =  $this->lastTrade();
		$statement = $this->connection->prepare("INSERT INTO  carteechange (id_trade,id_CarteD,id_CarteO) VALUES (:trade,:CD,:CO) ;");
		$statement->bindParam(':trade',  $trade);
		$statement->bindParam(':CD', $id_carteDemande);
		$statement->bindParam(':CO', $id_CarteOffre);
		$statement->execute();
		
	}
	
	public function deleteTrade($id)
	{
		$statement = $this->connection->prepare("DELETE FROM echange WHERE id_trade = :id;" );
		$statement->bindParam(':id',$id);
		$statement->execute();
	}
	
	public function dealTrade($id)
	{
		$statement = $this->connection->prepare("UPDATE echange SET confirmed = 1 WHERE id_trade = :id;" );
		$statement->bindParam(':id',$id);
		$statement->execute();
	}
	
	public function findCarteTrade($id)
	{
		$statement = $this->connection->prepare("SELECT * FROM carteechange WHERE id_trade = :id;");
		$statement->bindParam(':id',$id);
		$statement->execute();
		
		$resultArray = $statement->fetchAll();
		
		return $resultArray[0];
	}
	
	}