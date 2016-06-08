<?php

class MembreDAO
{
	private static $INSTANCE;
	private $connection;
	
	public static function getInstance()
	{
		if (self::$INSTANCE == null)
			self::$INSTANCE = new MembreDAO();
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
	public function findAllMember()
	{
		$statement = $this->connection->prepare("SELECT * FROM membre ;");
		$statement->execute();
		
		$resultArray = $statement->fetchAll();
		
		return $resultArray;
	}
	
	public function addMember($name,$surname,$mail,$psw,$nick)
	{
		$statement = $this->connection->prepare("INSERT INTO  membre (nom,prenom,email,mdp,pseudo,admin) VALUES (:name,:surname,:mail,:psw,:nick,0) ;");
		$statement->bindParam(':name', $name);
		$statement->bindParam(':surname', $surname);
		$statement->bindParam(':mail', $mail);
		$statement->bindParam(':psw', $psw);
		$statement->bindParam(':nick', $nick);
		$statement->execute();
		
	}
	
	public function deleteMember($id)
	{
		$statement = $this->connection->prepare("DELETE FROM membre WHERE id_membre = :id;" );
		$statement->bindParam(':id',$id);
		$statement->execute();
	}
	
	public function updateMember($key,$value,$id)
	{
		switch ($key) {
					case 'nom' :	$statement = $this->connection->prepare("UPDATE  membre SET nom = :value WHERE id_membre = :id;" );
										$statement->bindParam(':value', $value);
										$statement->bindParam(':id',$id);
										$statement->execute();
								break;
					case 'prenom' :	$statement = $this->connection->prepare("UPDATE  membre SET prenom = :value WHERE id_membre = :id;" );
										$statement->bindParam(':name', $value);
										$statement->bindParam(':id',$id);
										$statement->execute();
								break;
					case 'email' :	$statement = $this->connection->prepare("UPDATE  membre SET email = :value WHERE id_membre = :id;" );
										$statement->bindParam(':name', $value);
										$statement->bindParam(':id',$id);
										$statement->execute();
								break;
					case 'mdp' :	$statement = $this->connection->prepare("UPDATE  membre SET mdp = :value WHERE id_membre = :id;" );
										$statement->bindParam(':name', $value);
										$statement->bindParam(':id',$id);
										$statement->execute();
								break;
					case 'pseudo' :	$statement = $this->connection->prepare("UPDATE  membre SET pseudo = :value WHERE id_membre = :id;" );
										$statement->bindParam(':name', $value);
										$statement->bindParam(':id',$id);
										$statement->execute();
								break;			
					case 'admin' :	$statement = $this->connection->prepare("UPDATE  membre SET admin = :value WHERE id_membre = :id;" );
										$statement->bindParam(':name', $value);
										$statement->bindParam(':id',$id);
										$statement->execute();
								break;		
		}
	}
	
	public function findMember($id)
	{
		$statement = $this->connection->prepare("SELECT * FROM membre WHERE id_membre = :id;");
		$statement->bindParam(':id',$id);
		$statement->execute();
		
		$resultArray = $statement->fetch();
		
		return $resultArray;
	}
	
	
	public function findMemberByPseudo($pseudo)
	{
		$statement = $this->connection->prepare("SELECT * FROM membre WHERE pseudo = :pseudo;");
		$statement->bindParam(':pseudo',$pseudo);
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
	
	public function testPseudo($pseudo)
	{
		$statement = $this->connection->prepare("SELECT * FROM membre WHERE pseudo = :pseudo ;");
		$statement->bindParam(':pseudo', $pseudo);
		$statement->execute();	
		return $statement->rowCount();
	}
	
	public function testConnexion($pseudo,$mdp)
	{
		$statement = $this->connection->prepare("SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp ;");
		$statement->bindParam(':pseudo', $pseudo);
		$statement->bindParam(':mdp', $mdp);
		$statement->execute();	
		return $statement->rowCount();
	}
	
	public function getMemberIdByPseudo($pseudo)
	{
		$statement = $this->connection->prepare("SELECT id_membre from membre WHERE pseudo = :pseudo");
		$statement->bindParam(':pseudo', $pseudo);
		$statement->execute();	
		
		return $statement->fetch()['id_membre'];
		
	}
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	