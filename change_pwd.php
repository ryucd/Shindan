<?php
session_start();
include "setting.php";

if(!isset($_SESSION['id'])){
	gotoindex();
}
if(!post_check()){
	exit(0);
}

include "header.php";

	$pwd = $_POST['pwd'];
	$newpwd = $_POST['newpwd'];
	$login_name = $_SESSION['login_name'];


$db = new mydb();
$query = "select * from member where login_name=$1";
$result = $db->query($query, array($login_name));
$row = pg_fetch_assoc($result, 0);

if (password_verify($pwd, $row['pwd'])) { // パスワードが正しい
	$newpasswd = password_hash($newpwd, PASSWORD_DEFAULT);
	$sql1 = "UPDATE member SET pwd = $1 WHERE login_name = $2";
	$result1 = $db->query($sql1, array($newpasswd,$login_name), "get");
	print "パスワードを更新しました。";
} else {
	print "現在のパスワードが間違っています。";
}

include "footer.php";

function post_check()
{
	return isset($_POST['newpwd'])&isset($_POST['pwd']);
}
?></body></html>