<?
session_start();

$_GET['pagename'] = 'list';
include "setting.php";

if(!isset($_GET['id'])){
	gotoindex();
}
if(!is_numeric($_GET['id'])){
	exit(0);
}

include "header.php";

$id = $_GET['id'];
$q_result = get_question($id);
$c_result = get_choices($id);
if($q_result == false || $c_result == false){
	print "診断が存在しません。";
	exit(0);
} else {
	$question = pg_fetch_assoc($q_result, 0);
	$dt = date("Y-m-d H:i:s", strtotime($question['date']));
	print "診断：{$question['content']}<br>";
	print "作成日時：{$dt}<br>";
	print "質問：{$question['question']}<br>";
	
	$num = pg_num_rows($c_result);
	for($i = 0; $i < $num; $i++){
		$choice = pg_fetch_assoc($c_result, $i);
		print "<a href='answer.php?id={$id}&ans={$choice['id']}'>".$choice['choice']."</a><br>";
	}
}

include "footer.php";



function get_question($id){
	$db = new mydb();
	$query = "select * from crystal c where c.id = $1";
	$result = $db->query($query, array($id));
	return $result;
}

function get_choices($id) {
	$db = new mydb();
	$query = "select * from choices c where c.q_id = $1";
	$result = $db->query($query, array($id), "choices");
	return $result;
}
?>