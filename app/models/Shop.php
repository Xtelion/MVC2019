<?php

/**
 *  Clase Shop
 */
class Shop
{
	private $db;
	
	function __construct()
	{
		$this->db = MySQLdb::getInstance()->getDatabase();
	}

	public function getMostSold()
    {
        $sql = 'SELECT * FROM products WHERE mostSold = 1 AND deleted = 0 LIMIT 8';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function getNews()
    {
        $sql = 'SELECT * FROM products WHERE mostSold = 0 AND deleted = 0 AND new = 1 LIMIT 8';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getProductById($id)
    {
        $sql = 'SELECT * FROM products WHERE id = :id';
        $query = $this->db->prepare($sql);
        $query->execute([':id' => $id]);
        return $query->fetch();
    }
}