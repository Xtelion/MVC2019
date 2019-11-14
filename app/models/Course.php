<?php
/**
 * Created by PhpStorm.
 * User: salmeron
 * Date: 14/11/19
 * Time: 19:10
 */

class Course
{

    private $db;

    function __construct()
    {
        $this->db = MySQLdb::getInstance()->getDatabase();
    }

    public function getCourses()
    {
        $sql = 'SELECT * FROM products WHERE deleted = 0 AND type = 1';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

}