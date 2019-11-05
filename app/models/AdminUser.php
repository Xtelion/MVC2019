<?php

/**
 * Administración de Usuarios
 */
class AdminUser
{
	private $db;
	
	public function __construct()
	{
		$this->db = MySQLdb::getInstance()->getDatabase();
	}

	public function createAdminUser($data)
	{
		if ( ! $this->existsEmail($data['email'])) {

			$sql = 'INSERT INTO admins(name, email, password, status, deleted, login_at, created_at, updated_at, deleted_at) VALUES (:name, :email, :password, :status, :deleted, :login_at, :created_at, :updated_at, :deleted_at)';

			$query = $this->db->prepare($sql);

			$params = [
				':name' => $data['name'],
				':email' => $data['email'],
				':password' => hash_hmac('sha512', $data['password'], ENCRIPTKEY),
				':status' => 1,
				':deleted' => 0,
				':login_at' => null,
				':created_at' => date('Y-m-d H:i:s'),
				':updated_at' => null,
				':deleted_at' => null
			];

			return $query->execute($params);
		}
	}

	public function existsEmail($email)
	{
		$sql = 'SELECT * FROM admins WHERE email=:email';
		$query = $this->db->prepare($sql);
		$query->execute([':email' => $email]);
		return $query->rowCount();
	}
}