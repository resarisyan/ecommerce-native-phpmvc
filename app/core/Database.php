<?php 

class Database
{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $db_name = DB_NAME;

	private $dbh; //database handler
	private $stmt; //statement

	public function __construct()
	{
		//data source name
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

		$option = 
		[
			PDO::ATTR_PERSISTENT => true, //Untuk menajaga koneksi database terjaga terus atau untuk optimasi
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Mode Error
		];

		try
		{
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
		} 

		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}

	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type = null)
	//Binding data supaya aman dan terhindar dari sql injection karena query dieksekusi setelah string dibersihkan terlebih dahulu  
	{
		if(is_null($type))
		{
			switch(true)
			{
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default :
					$type = PDO::PARAM_STR;
			}
		}

		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute()
	{
		$this->stmt->execute();
	}

	public function resultSet()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function single()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function rowCount()
	{
		return $this->stmt->rowCount();// Ini rowCount() punya PDO
	}
}