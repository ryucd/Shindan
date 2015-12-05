<?
session_start();
include "setting.php";

if(!isset($_SESSION['id']) || !isset($_SESSION['ipaddress'])){
	gotoindex();
}
check_login();

if(!isset($_GET['id']) || !isset($_GET['ans'])){
	exit(0);
}

include "header.php";

$q_id = $_GET['id'];
$ans = $_GET['ans'];
$m_id = $_SESSION['id'];

if(update_answer($m_id, $q_id, $ans) != false){
	$answer = get_answer($ans);
	$q = pg_fetch_assoc($answer, 0);
	$ans = getAnswer($q['answer']);
	update_log($m_id, $q['answer']);
	print "結果は{$ans}です。";
}

include "footer.php";

function get_answer($id){
	$db = new mydb();
	$query = "select * from choices where id = $1";
	$result = $db->query($query, array($id), "getans");
	return $result;
}

function update_answer($m_id, $q_id, $answer){
	$db = new mydb();
	$query = "insert into answer (m_id, q_id, answer) values($1, $2, $3)";
	$result = $db->query($query, array($m_id, $q_id, $answer));
	return $result;
}

function update_log($m_id, $answer){
	$sex = getNewLogSex($m_id, $answer);
	$db = new mydb();
	$query = "insert into log (m_id, sex) values($1, $2)";
	$result = $db->query($query, array($m_id, $sex), "setlog");
}
?>
