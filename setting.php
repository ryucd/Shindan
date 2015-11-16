<?

class mydb {
	private $dbhost = "localhost";
	private $dbname = "j132080r";
	private $dbuser = "j132080r";
	
	private $db;
	
	public function __construct()
	{
		$this->db = pg_connect("host=".$this->dbhost." dbname=".$this->dbname." user=".$this->dbuser);
	}
	
	public function query($sql, array $params = array(), $q = "")
	{
		$stmt = pg_prepare($this->db, $q, $sql);
		$result = pg_execute($this->db, $q, $params);
		
		return $result;
	}
	
	public function get_user($username)
	{
		$query = "select * from member where login_name=$1";
		$result = $this->query($query, array($username));
		
		return $result;
	}
}

?>