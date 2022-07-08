<?php

class UserModel
{
	private $table;
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function validation($data)
	{
		if (strlen($data["password"]) <= 6) {
			return false;
		} else {
			return true;
		}
	}

	public function getUser($username, $role)
	{
		if ($role == 0) {
			$this->db->query("SELECT * FROM admin WHERE username=:username");
		} else {
			$this->db->query("SELECT * FROM pelanggan WHERE status_pelanggan='1' AND username=:username");
		}
		$this->db->bind("username", $username);
		return $this->db->single();
	}

	public function getUserById($id, $role)
	{
		if ($id == null) {
			return false;
		}
		$this->table = ($role == 0) ? "admin" : "pelanggan";
		$this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
		$this->db->bind("id", $id);
		return $this->db->single();
		// ambil username berdasarkan id
	}

	public function tambahUser($data)
	{
		if (
			$data["nama"] == null ||
			$data["notelp"] == null ||
			$data["username"] == null ||
			$data["password"] == null
		) {
			return false;
		}
		$this->table = "pelanggan";
		$password = md5($data["password"]);
		$query = "INSERT INTO " . $this->table . "
					VALUES
					('', :nama, :notelp, :username, :password, '1', NOW(), NOW())";

		$this->db->query($query);
		$this->db->bind("nama", $data["nama"]);
		$this->db->bind("notelp", $data["notelp"]);
		$this->db->bind("username", $data["username"]);
		$this->db->bind("password", $password);
		// $this->db->bind("role", "1");
		$this->db->execute();
		return $this->db->rowCount();
	}
}
