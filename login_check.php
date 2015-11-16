<?
session_start();

include "setting.php";

if(post_check()){
	$login_name = $_POST['login_name'];
	$pwd = $_POST['pwd'];
} else {
	printf("ログインフォームからログインして下さい");
	exit(0);
}

$db = new mydb();
$query = "select * from member where login_name=$1";
$result = $db->query($query, array($login_name));

if(pg_num_rows($result) == 1){
	$row = pg_fetch_assoc($result, 0);
	if(password_verify($pwd, $row['pwd'])){
		print $row['login_name']."さん<br>ログイン成功<br>";
		print "<a href=\"index.php\">Topページ</a>へ";
		
		$_SESSION['login_name'] = $row['login_name'];
		$_SESSION['id'] = $row['id'];
	} else {
		login_failed();
	}
} else {
	login_failed();
}

function post_check()
{
	return isset($_POST['login_name'])&isset($_POST['pwd']);
}

function login_failed()
{
	include "login_failed.php";
}
?>