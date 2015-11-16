<?
session_start();
include "setting.php";

if(!isset($_GET['id']) || !isset($_GET['ans']) || !isset($_SESSION['id'])){
	exit(0);
}

$q_id = $_GET['id'];
$ans = $_GET['ans'];
$m_id = $_SESSION['id'];

if(update_answer($m_id, $q_id, $ans) != false){
	$answer = get_answer($ans);
	$q = pg_fetch_assoc($answer, 0);
	print "結果は{$q['answer']}です。";
}

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
?>