<?php
/**
 * Created by PhpStorm.
 * User: salmeron
 * Date: 7/11/19
 * Time: 16:02
 */

class AdminProduct
{

    private $db;

    public function __construct()
    {
        $this->db = MySQLdb::getInstance()->getDatabase();
    }

    public function getProducts()
    {
        $sql = "SELECT * FROM products WHERE deleted = 0";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getConfig($type)
    {
        $sql = 'SELECT * FROM config WHERE type = :type ORDER BY value';
        $query = $this->db->prepare($sql);
        $query->execute([':type' => $type]);
        return $query->fetchAll();
    }

    public function getCatalogue()
    {
        $sql = "SELECT id, name, type FROM products WHERE deleted = 0 AND status != 0 ORDER BY type, name";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function createProduct($data)
    {
        $sql = "INSERT INTO products (type, name, description, price, discount, send, image, published, relation1, relation2, 
                                        relation3, mostSold, new, status, deleted, created_at, updated_at, deleted_at, author, 
                                        publisher, pages, people, objetives, necesites) 
                                        VALUES 
                                      (:type, :name, :description, :price, :discount, :send, :image, 
                                        :published, :relation1, :relation2, :relation3, :mostSold, :new, 
                                        :status, :deleted, :created_at, :updated_at, :deleted_at, :author, 
                                        :publisher, :pages, :people, :objetives, :necesites)";



        $params = [
            ':type' => $_POST['type'],
            ':name' => $data['name'],
            ':description' => $data['description'],
            ':price' => $data['price'],
            ':discount' => $data['discount'],
            ':send' => $data['send'],
            ':image' => 'img/' .$data['image'],
            ':published' => $data['published'],
            ':relation1' => (int)$data['relation1'],
            ':relation2' => (int)$data['relation2'],
            ':relation3' => (int)$data['relation3'],
            ':mostSold' => $data['mostSold'],
            ':new' => $data['new'],
            ':status' => $data['status'],
            ':deleted' => 0,
            ':created_at' => date('Y-m-d H:i:s'),
            ':updated_at' => null,
            ':deleted_at' => null,
            ':author' => $data['author'],
            ':publisher' => $data['publisher'],
            ':pages' => $data['pages'],
            ':people' => $data['people'],
            ':objetives' => $data['objetives'],
            ':necesites' => $data['necesites']
        ];

        $query = $this->db->prepare($sql);
        $query->bindParam(':type', $_POST['type']);
        $query->execute($params);
        $count = $query->rowCount();
        if($count == 1)
        {
            return true;
        }
        return false;
    }

}