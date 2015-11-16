<?
session_start();

include "setting.php";

if(!post_check() || !isset($_SESSION['id'])){
	exit(0);
}

$m_id = $_SESSION['id'];
$content = $_POST['content'];
$question = $_POST['question'];
$choice = $_POST['choice'];
$answer = $_POST['answer'];

if(check_submit($content, $question, $choice, $answer) == false){
	exit(0);
}

$db = new mydb();
if(insert_question($db, $content, $question, $m_id) == false){
	sql_failed();
	exit(0);
}
for($i = 0; $i<count($choice); $i++){
	if(insert_choice($db, $choice[$i], $answer[$i]) == false){
		sql_failed();
		exit(0);
	}
}
print "診断を追加しました。";

function post_check(){
	return isset($_POST['content'])&isset($_POST['question'])&isset($_POST['choice'])&isset($_POST['answer']);
}

function check_submit($content, $question, $choice, $answer){
	if(!is_array($choice) || !is_array($answer)){
		// 選択肢が配列になっていない
		print "正しく送信されませんでした。";
		return false;
	}
	if(empty($content) || empty($question)){
		// 入力されていない項目がある
		print "全ての項目を入力してください。";
		return false;
	}
	
	for($i = 0; $i<count($choice); $i++){
		if(empty($choice[$i]) || empty($answer[$i])){
			print "全ての項目を入力してください。";
			return false;
		}
	}
	
	return true;
}

function insert_question($db, $c, $q, $m){
	$query = "INSERT INTO crystal (content, question, m_id) VALUES ($1, $2, $3)";
	$result = $db->query($query, array($c, $q, $m), "question");
	return $result;
}

function insert_choice($db, $c, $a){
	$query = "insert into choices (choice, answer, q_id) values($1, $2, currval('crystal_id_seq'))";
	$result = $db->query($query, array($c, $a));
	return $result;
}

function sql_failed(){
	print "診断項目の追加に失敗しました。";
}
?>