	
	<?php
	
	class articleDAO
	{
		
		/*
			Insertion de la connection a la BDD dans les fonctions
			pour centraliser les elements de BDD.
		*/
		
		private $connect;
		private static $INSTANCE;
		
		
		public static function getInstance()
		{
			if (self::$INSTANCE == null)
				self::$INSTANCE = new articleDAO();
			return self::$INSTANCE;
		}
		
		
		private function __construct()
		{
			$this->connectToDatabase();
			
		}
		
		private function connectToDatabase()
		{
			$username = 'root';
			$password = '';
			$servername = 'localhost';

			try {
				
				$conn = new PDO("mysql:host=$servername;dbname=bddblog", $username, $password);

				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e) {
				
				die("Connection failed: " . $e->getMessage());
			}
			$this->connect = $conn;
			
		}
		
		public function disconnectFromDatabase()
		{
			$this->connect = null;
		}

			
		
		public function getAllArticles()
		{
			$statement = $this->connect->prepare("SELECT * FROM article;");
			$statement->execute();
			
			$resultArray = $statement->fetchAll();
						
			return $resultArray;
		}
		
		

		public function addArticle($name, $textValue)
		{
			$statement = $this->connect->prepare("INSERT INTO article (name, textValue) VALUES (:name, :textValue);");
			$statement->bindParam(':name', $name);
			$statement->bindParam(':textValue', $textValue);
			$statement->execute();

		}

		public function deleteArticleData($id)
		{
			$statement = $this->connect->prepare("DELETE FROM article WHERE id=:id;");
			$statement->bindParam(':id', $id);
			$statement->execute();

		}

		public function modifyArticleData($id, $name, $textValue)
		{
			$statement = $this->connect->prepare("UPDATE article SET name=:name, textValue=:textValue WHERE id=:id;");
			$statement->bindParam(':id', $id);
			$statement->bindParam(':name', $name);
			$statement->bindParam(':textValue', $textValue);
			$statement->execute();

		}
		
		public function __destruct()
		{
			$this->disconnectFromDatabase();
		}
		
		
	}
		