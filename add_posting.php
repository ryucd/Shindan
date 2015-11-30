<?
session_start();

include "setting.php";

if(!isset($_SESSION['id'])){
	gotoindex();
}

if(!post_check()){
	exit(0);
} else {
	set_cookie();
}

$_GET['pagename'] = "posting";
include "header.php";

$m_id = $_SESSION['id'];
$content = $_POST['content'];
$question = $_POST['question'];
$choice = $_POST['choice'];
$answer = $_POST['answer'];

if(check_submit($content, $question, $choice, $answer) == false){
	print "<a href='posting.php'>戻る</a>";
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

reset_cookie();
print "診断を追加しました。";

include "footer.php";

function post_check(){
	return isset($_POST['content'])&isset($_POST['question'])&isset($_POST['choice'])&isset($_POST['answer']);
}

function set_cookie(){
	setcookie("posting_content", $_POST['content'], time()+60*10);
	setcookie("posting_question", $_POST['question'], time()+60*10);
	for($i = 0; $i <= max(array_keys($_POST['choice'])); $i++){
		setcookie("posting_choice[".$i."]", $_POST['choice'][$i], time()+60*10);
	}
	for($i = 0; $i <= max(array_keys($_POST['answer'])); $i++){
		setcookie("posting_answer[".$i."]", $_POST['answer'][$i], time()+60*10);
	}
}

function reset_cookie(){
	setcookie("posting_content", "", time()-60*10);
	setcookie("posting_question", "", time()-60*10);
	setcookie("posting_choice", "", time()-60*10);
	setcookie("posting_answer", "", time()-60*10);
}

function check_submit($content, $question, $choice, $answer){
	if(!is_array($choice) || !is_array($answer)){
		// 選択肢が配列になっていない
		print "正しく送信されませんでした。<br>";
		return false;
	}
	if(empty($content) || empty($question)){
		// 入力されていない項目がある
		print "全ての項目を入力してください。<br>";
		return false;
	}
	
	for($i = 0; $i<count($choice); $i++){
		if(empty($choice[$i]) || empty($answer[$i])){
			print "全ての項目を入力してください。<br>";
			return false;
		}
	}
	
	if(count($choice) > 10){
		print "選択肢は10個までにしてください。<br>";
		return false;
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