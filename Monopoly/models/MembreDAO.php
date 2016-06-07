<?php

class MembreDAO
{
	private static $INSTANCE;
	private $connection;
	
	private getInstance()
	{
		if (self::$INSTANCE == null)
			$this->INSTANCE = new CarteDAO();
		return $INSTANCE;
	}
	
	private __construct()
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
	
	public function updateMember()
	{
		//Rom, A TOI DE JOUER
	}