<?php
/**
 * Created by PhpStorm.
 * User: salmeron
 * Date: 19/11/19
 * Time: 15:33
 */

class Book
{

    private $db;

    function __construct()
    {
        $this->db = MySQLdb::getInstance()->getDatabase();
    }

    public function getBooks()
    {
        $sql = 'SELECT * FROM products WHERE deleted = 0 AND type = 2';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

}