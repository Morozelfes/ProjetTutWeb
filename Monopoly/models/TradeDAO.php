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
		$statement = $this->connection->prepare("SELECT id_trade FROM echange ORDER BY desc LIMIT 1;");
		$statement->execute();
		$lastInsertId = $statement->fetch(PDO::FETCH_OBJ)->Id_trade;
		return $lastInsertId;
	}
	
	public function addCarteEchange($id_carteDemande,$id_CarteOffre)
	{
		$trade =  lastTrade();
		$statement = $this->connection->prepare("INSERT INTO  carteechange (id_trade,id_CarteD,id_CarteO) VALUES (:trade,:CD,:CO) ;");
		$statement->bindParam(':trade',  $trade);
		$statement->bindParam(':CD', $CD);
		$statement->bindParam(':CO', $CO);
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
		$statement = $this->connection->prepare("UPDATE  echange SET confirmed = 1 WHERE id_trade = :id;" );
		$statement->bindParam(':id',$id);
		$statement->execute();
	}
	
	public function findCarteTrade($id)
	{
		$statement = $this->connection->prepare("SELECT * FROM carteechange WHERE id_trade = :id;");
		$statement->bindParam(':id',$id);
		$statement->execute();
		
		$resultArray = $statement->fetchAll();
		
		return $resultArray;
	}
	
	}