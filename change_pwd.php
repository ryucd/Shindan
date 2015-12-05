<?php
session_start();
include "setting.php";

if(!isset($_SESSION['id']) || !isset($_SESSION['ipaddress'])){
	gotoindex();
}
check_login();

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
	$ck = check_new_pwd($newpwd);
	if($ck != ''){
		print $ck;
		include "footer.php";
		return;
	}
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

function check_new_pwd($pass)
{
	if($pass == ''){
		return "新しいパスワードを入力してください。";
	}
	if(!preg_match("/^[a-zA-Z0-9]+$/", $pass)){
    	return "パスワードは半角英数字のみ利用できます。";
    }
	if(mb_strlen($pass) < 6){
		return "新しいパスワードは6文字以上にしてください。";
	}

	return "";
}
?></body></html>
