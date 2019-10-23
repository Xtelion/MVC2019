<?php
/**
* 
*/
class Login 
{
	private $db;
	
	function __construct()
	{
		$this->db = MySQLdb::getInstance()->getDatabase();
	}
}