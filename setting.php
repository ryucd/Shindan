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

function gotoindex(){
	header("Location: index.php");
}

function getSex($n){
	if($n == '1'){
		return "男";
	} else {
		return "女";
	}
}

function getNewLogSex($id, $n){
	$db = new mydb();
	$query = "select c.answer from answer a, choices c where a.m_id = $1 and c.id = a.answer";
	$result = $db->query($query, array($id), "getNewLogSex");
	
	$num = pg_num_rows($result);
	$sum = 0;
	if($num == 0) return "1000";
	for($i = 0; $i < $num; $i++){
		$row = pg_fetch_assoc($result, $i);
		$sum += intval($row['answer']);
	}
	$sum += $n;
	return $sum/($num+1);
}

function getAnswer($per){
	$ans = "";
	if($per < 0){
		$ans = "女性度".(0-$per)."%";
	} else if($per > 0){
		$ans = "男性度".$per."%";
	} else {
		$ans = "男性女性どちらでもない中性";
	}
	return $ans;
}

function check_login(){
	if($_SESSION['ipaddress'] !== $_SERVER['REMOTE_ADDR']){
		session_destroy();
    	exit('ログイン検証に失敗しました！');
	}
}
?>
