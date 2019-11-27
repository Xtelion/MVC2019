<?php
/**
 * Created by PhpStorm.
 * User: salmeron
 * Date: 20/11/19
 * Time: 16:32
 */

class Cart
{

    private $db;

    public function __construct()
    {
        $this->db = MySQLdb::getInstance()->getDatabase();
    }

    public function verifyProduct($product_id, $user_id)
    {
        $sql = 'SELECT * FROM carts WHERE product_id=:product_id AND user_id=:user_id';

        $query = $this->db->prepare($sql);
        $params = [
            ':product_id' => $product_id,
            ':user_id' => $user_id
        ];
        $query->execute($params);


        return $query->rowCount();
    }

    public function addProduct($product_id, $user_id)
    {
        $sql1 = 'SELECT * FROM products WHERE id=:id';
        $query1 = $this->db->prepare($sql1);
        $query1->execute([':id' => $product_id]);
        $product = $query1->fetch();

        $sql = 'INSERT INTO carts(state, user_id, product_id, quantity, discount, send, date)
                  VALUES(0, :user_id, :product_id, :quantity, :discount, :send, :date)';

        $query = $this->db->prepare($sql);
        $params = [
            ':user_id' => $user_id,
            ':product_id' => $product_id,
            ':quantity' => 1,
            ':discount' => $product->discount,
            ':send' => $product->send,
            ':date' => date('Y-m-d H:i:s')
        ];
        $query->execute($params);
        return $query->rowCount();
    }

    public function getCart($user_id)
    {
        $sql = 'SELECT c.id, c.user_id as user, c.product_id as product, c.quantity as quantity,
              c.send as send, c.discount as discount, p.price as price, p.image as image,
              p.name as name, p.description as description
              FROM carts c, products p WHERE c.user_id = :user_id AND c.product_id = p.id AND state = 0';
        $query = $this->db->prepare($sql);
        $query->execute([':user_id' => $user_id]);
        return $query->fetchAll();
    }

    public function update($user, $product, $quantity)
    {
        $sql = 'UPDATE carts SET quantity=:quantity WHERE user_id = :user_id AND product_id = :product_id';
        $query = $this->db->prepare($sql);
        $params = [
            ':user_id' => $user,
            ':product_id' => $product,
            ':quantity' => $quantity
        ];
        return $query->execute($params);
    }

    public function delete($product, $user)
    {
        $sql = 'DELETE FROM carts WHERE user_id = :user_id AND product_id = :product_id';

        $query = $this->db->prepare($sql);
        $params = [
            ':product_id' => $product,
            ':user_id' => $user
        ];
        return $query->execute($params);
    }

    public function closeCart($id, $state)
    {
        $sql = 'UPDATE carts SET state = :state, date = :date WHERE user_id = :user_id AND state = 0';
        $query = $this->db->prepare($sql);
        $params = [
            ':state' => $state,
            ':user_id' => $id,
            ':date' => date('Y-m-d H:i:s')
        ];
        return $query->execute($params);
    }

    public function sales()
    {
        $sql = 'SELECT SUM(p.price * c.quantity) as cost, SUM(c.discount) as discount, SUM(c.send) as send,
                c.date as date, c.user_id as user_id FROM carts c, products p WHERE c.product_id = p.id AND c.state = 1
                GROUP BY date(c.date), c.user_id';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function show($date, $id)
    {
        $sql = 'SELECT p.price as price, c.discount as discount,c.send as send, c.quantity as quantity,
                p.name as name FROM carts c, products p WHERE c.product_id = p.id AND c.state = 1 AND date(date) = :date
                AND c.user_id = :id';
        $query = $this->db->prepare($sql);
        $params = [
            ':id' => $id,
            ':date' => $date
        ];
        $query->execute($params);

        return $query->fetchAll();
    }

    public function dailySales()
    {
        $sql = 'SELECT (SUM(p.price * c.quantity) - SUM(c.discount) + SUM(c.send)) as sale,
                DATE(c.date) as date FROM carts c, products p WHERE c.product_id = p.id AND c.state = 1
                GROUP BY date(c.date)';

        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

}