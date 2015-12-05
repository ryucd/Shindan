<?
if(!isset($_SESSION['id'])){
	session_start();
}

if(!isset($_SESSION['id'])){
	printf("ログインしないと利用できません。");
	exit(0);
}

$_GET['pagename'] = 'list';
include "setting.php";

if(isset($_POST['search'])){
	$search = $_POST['search'];
	$result = get_questions_with_search($search);
} else {
	$result = get_questions();
}
$num = pg_num_rows($result);
for($i = 0; $i<$num; $i++){
	$row = pg_fetch_assoc($result, $i);
	$dt = date("Y-m-d", strtotime($row['date']));
	print "<tr>";
	print "<td><a href='diagnosis.php?id=".$row['id']."'>".htmlspecialchars($row['content'])."</a></td>";
	print "<td class='user'>{$row['login_name']}</td>";
	print "<td class='date'>{$dt}</td>";
	print "</tr>\n";
}

function get_questions(){
	$db = new mydb();
	$query = "select c.id, c.date, c.content, m.login_name from crystal c, member m where c.m_id = m.id order by c.date desc";
	$result = $db->query($query);
	return $result;
}

function get_questions_with_search($search){
	$db = new mydb();
	$query = "select c.id, c.date, c.content, m.login_name from crystal c, member m where c.m_id = m.id and c.content like $1";
	$result = $db->query($query, array("%".$search."%"), "search");
	return $result;
}
?>
