<?
session_start();
include "setting.php";

if(!isset($_SESSION['id']) || !isset($_SESSION['ipaddress'])){
	gotoindex();
}

check_login();

$_GET['pagename'] = 'log';
include "header.php";

$result = get_my_answers($_SESSION['id']);
print_list($result);

include "footer.php";

function print_list($result)
{
	$num =  pg_num_rows($result);
	if($num == 0){
		print "まだ診断を行っていません。<br>\n";
	} else {
		print "<table>\n";
		print "<tr><th>診断名</th><th>回答</th><th>結果</th></tr>\n";
		for($i = 0; $i < $num; $i++){
				$row = pg_fetch_assoc($result, $i);
				$ans = getAnswer($row['answer']);
				print "<tr><td>{$row['content']}</td><td>{$row['choice']}</td><td>{$ans}</td></tr>\n";
		}
		print "</table>\n";
	}
}

function get_my_answers($id){
	$db = new mydb();
	$query = "select q.id as q_id, q.content, c.choice, c.answer from crystal q, answer a, choices c where a.q_id = q.id and a.answer = c.id and a.m_id = $1";
	$result = $db->query($query, array($id), "getans");
	return $result;
}
?>
