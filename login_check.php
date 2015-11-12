<?
include "setting.php";

$login_name = $_POST['login_name'];
$pwd = $_POST['pwd'];

$db = new mydb();
$query = "select * from member where login_name=$1";
$result = $db->query($query, array($login_name));

if(pg_num_rows($result) == 1){
	$row = pg_fetch_assoc($result, 0);
	if(password_verify($pwd, $row['pwd'])){
		print $row['login_name']."さん<br>ログイン成功<br>";
		print "<a href=\"index.php\">Topページ</a>へ";
	} else {
		login_failed();
	}
} else {
	login_failed();
}
	
function login_failed()
{
	include "login_failed.php";
}
?>