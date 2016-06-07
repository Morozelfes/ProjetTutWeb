<?php

class MembreDAO
{
	private static $INSTANCE;
	private $connection;
	
	private function getInstance()
	{
		if (self::$INSTANCE == null)
			$this->INSTANCE = new CarteDAO();
		return $INSTANCE;
	}
	
	private  function __construct()
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
	public function findAll()
	{
		$statement = $this->connection->prepare("SELECT * FROM membre ;");
		$statement->execute();
		
		$resultArray = $statement->fetchAll();
		
		return $resultArray;
	}
	
	public function addMember($name,$surname,$mail,$psw,$nick,$adm)
	{
		$statement = $this->connection->prepare("INSERT INTO  membre (nom,prenom,email,mdp,pseudo,admin) VALUES (:name,:surname,:mail,:psw,:nick,:adm) ;");
		$statement->bindParam(':name', $name);
		$statement->bindParam(':surname', $surname);
		$statement->bindParam(':mail', $mail);
		$statement->bindParam(':psw', $psw);
		$statement->bindParam(':nick', $nick);
		$statement->bindParam(':adm', $adm);
		$statement->execute();
		
	}
	
	public function deleteMember($id)
	{
		$statement = $this->connection->prepare("DELETE FROM membre WHERE id_membre = :id;" )
		$statement->bindParam(':id',$id);
		$statement->execute();
	}
	
	public function updateMember($key,$value,$id)
	{
		switch ($key) {
					case nom :	$statement = $this->connection->prepare("UPDATE  membre SET nom = :value WHERE id_membre = :id;" )
										$statement->bindParam(':value', $value);
										$statement->bindParam(':id',$id);
										$statement->execute();
								break;
					case prenom :	$statement = $this->connection->prepare("UPDATE  membre SET prenom = :value WHERE id_membre = :id;" )
										$statement->bindParam(':name', $value);
										$statement->bindParam(':id',$id);
										$statement->execute();
								break;
					case email :	$statement = $this->connection->prepare("UPDATE  membre SET email = :value WHERE id_membre = :id;" )
										$statement->bindParam(':name', $value);
										$statement->bindParam(':id',$id);
										$statement->execute();
								break;
					case mdp :	$statement = $this->connection->prepare("UPDATE  membre SET mdp = :value WHERE id_membre = :id;" )
										$statement->bindParam(':name', $value);
										$statement->bindParam(':id',$id);
										$statement->execute();
								break;
					case pseudo :	$statement = $this->connection->prepare("UPDATE  membre SET pseudo = :value WHERE id_membre = :id;" )
										$statement->bindParam(':name', $value);
										$statement->bindParam(':id',$id);
										$statement->execute();
								break;			
					case admin :	$statement = $this->connection->prepare("UPDATE  membre SET admin = :value WHERE id_membre = :id;" )
										$statement->bindParam(':name', $value);
										$statement->bindParam(':id',$id);
										$statement->execute();
								break;		
		}
	
	public function findMember($id)
	{
		$statement = $this->connection->prepare("SELECT * FROM membre WHERE id_membre = :id;");
		$statement->bindParam(':id',$id);
		$statement->execute();
		
		$resultArray = $statement->fetchAll();
		
		return $resultArray;
	}
	
	public function findAdmin()
	{
		$statement = $this->connection->prepare("SELECT * FROM membre WHERE admin = 1 ;");
		$statement->execute();
		
		$resultArray = $statement->fetchAll();
		
		return $resultArray;
	}
	
	public function testMail($mail)
	{
		$statement = $this->connection->prepare("SELECT * FROM membre WHERE email = :mail ;");
		$statement->bindParam(':mail', $mail);
		$statement->execute();	
		return $statement->rowCount();
	}
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	