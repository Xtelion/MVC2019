<?php

/**
* Base de datos
*/
class MySQLdb
{
	
	private $host = "mysql";
	private $user = "root";
	private $pass = "root";
	private $dbname = "MVC2019";

	private static $instance = null;
	private $db = null;

	private function __construct()
	{
		$options = [ 
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, 
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
		];

		try
		{
			$this->db = new PDO(
				'mysql:host=' .$this->host . ';dbname=' . $this->dbname,
				$this->user,
				$this->pass,
				$options
			);
		} catch(PDOException $event)
		{
			exit('La base de datos esta kaboom');
		}

	}

	public static function getInstance()
	{
		if(is_null(self::$instance))
		{
			self::$instance = new MySQLdb();
		}

		return self::$instance;
	}

	public function getDatabase()
	{
		return $this->db;
	}
		
}