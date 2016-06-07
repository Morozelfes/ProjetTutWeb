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
	
	public function findAll()
	{
		//Rom, A TOI DE JOUER
	}
	
	public function addCard()
	{
		//Rom, A TOI DE JOUER
	}
	
	public function deleteCard()
	{
		//Rom, A TOI DE JOUER
	}
	
	public function updateOwner()
	{
		//Rom, A TOI DE JOUER
	}
	
	
}