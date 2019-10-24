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

	public function createUser($data)
    {
        if($this->existsEmail($data['email']))
        {
            $sql = "INSERT INTO users(first_name, last_name1, last_name2, email, password, address,
                      city, state, zipcode, country)
                       VALUES (:first_name, :last_name1, :last_name2, :email, :password, :address, :city, :state, :postCode, :country)";
            $params = [
                ':first_name' => $data['first_name'],
                ':last_name1' => $data['last_name_1'],
                ':last_name2' => $data['last_name_2'],
                ':email' => $data['email'],
                ':password' => hash_hmac('sha512', $data['password'], 'DawSub-Normal'),
                ':address' => $data['address'],
                ':city' => $data['city'],
                ':state' => $data['state'],
                ':postCode' => $data['postCode'],
                ':country' => $data['country']
            ];
            $query = $this->db->prepare($sql);

            if($query->execute($params))
            {
                return true;
            }

            return false;
        }
        else
        {
            return false;
        }
    }

    public function existsEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email=:email";
        $conn = $this->db;
        $query = $conn->prepare($sql);
        $query->bindValue(':email', $email);
        $query->execute();

        $cuantos = $query->rowCount();
        if($cuantos == 0){
            return true;
        }
        return false;
    }
}