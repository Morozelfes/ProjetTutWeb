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
		//Rom, A TOI DE JOUER
	}
	
	public function addMember()
	{
		//Rom, A TOI DE JOUER
	}
	
	public function deleteMember()
	{
		//Rom, A TOI DE JOUER
	}
	
	public function updateMember()
	{
		//Rom, A TOI DE JOUER
	}
	