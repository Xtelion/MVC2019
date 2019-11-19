<?php
/**
 * Created by PhpStorm.
 * User: salmeron
 * Date: 19/11/19
 * Time: 16:39
 */

class Search
{
    private $db;

    function __construct()
    {
        $this->db = MySQLdb::getInstance()->getDatabase();
    }

    public function getProducts($data)
    {
        $sql = 'SELECT * FROM products WHERE deleted=0 AND (name LIKE :name OR publisher LIKE :publisher OR author LIKE :author
                OR people LIKE :people OR description LIKE :description)';
        if($data['url'] != 0)
        {
            $sql .= ' AND type = ' .$data['url'];
        }
        $params = [
          ':name' => '%' .$data['search'] . '%',
          ':publisher' => '%' .$data['search'] . '%',
          ':author' => '%' .$data['search'] . '%',
          ':people' => '%' .$data['search'] . '%',
          ':description' => '%' .$data['search'] . '%'
        ];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetchAll();
    }
}