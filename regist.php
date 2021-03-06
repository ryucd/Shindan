<?php
session_start();
include "setting.php";

if(!check_post()){
	print "フォームは全て記入してください。";
	exit;
}

$check = check_inputs();
if($check != ''){
	print $check;
	exit;
}

$login_name = $_POST["login_name"];
$pwd = $_POST["pwd"];
$sex = getSex($_POST["sex"]);
$hashpwd = password_hash($pwd, PASSWORD_DEFAULT);
$db = new mydb();

if(check_exist_user($db, $login_name) == true){
	$query = "INSERT INTO member (login_name,pwd,sex) VALUES($1, $2, $3)";
	$result = $db->query($query, array($login_name, $hashpwd, $sex));
	if($result == false){
		print "登録に失敗しました。";
	} else {
		$query = "select id from member where login_name=$1";
		$result = $db->query($query, array($login_name), "getid");
		$row = pg_fetch_assoc($result, 0);
		regist_success($login_name, $row['id']);
	}
} else {
	print "指定されたユーザー名は利用できません。";
}

function check_post(){
	return isset($_POST['login_name']) && isset($_POST['pwd']) && isset($_POST['sex']);
}

function check_inputs(){
	$name = $_POST['login_name'];
	$pass = $_POST['pwd'];
	$sx = $_POST['sex'];
	$err = "";
	
	if($name == ''){
		$err .= "IDを入力してください。<br>";
	} else {
		if(!preg_match("/^[a-zA-Z0-9]+$/", $name)){
			$err .= "IDは半角英数字のみ利用できます。<br>";
		}
		if(mb_strlen($name) < 4){
			$err .= "IDは4文字以上にしてください。<br>";
		}
		if(mb_strlen($name) > 32){
			$err .= "IDが長すぎます。32文字以下にしてください。<br>";
		}
	}
	
	if($pass == ''){
		$err .= "パスワードを入力してください。<br>";
	} else {
		if(!preg_match("/^[a-zA-Z0-9]+$/", $pass)){
			$err .= "パスワードは半角英数字のみ利用できます。<br>";
		}
		if(mb_strlen($pass) < 6){
			$err .= "パスワードは6文字以上にしてください。<br>";
		}
	}

	if($sx != '1' && $sx != '2'){
		$err .= "性別の値が不正です。<br>";
	}
	
	return $err;
}

function regist_success($login_name, $id)
{
	$_SESSION['login_name'] = $login_name;
	$_SESSION['id'] = $id;
	$_SESSION['ipaddress'] = $_SERVER['REMOTE_ADDR'];
	header("Location: top.php");
}

function check_exist_user($db, $user)
{
	$result = $db->get_user($user);
	if(pg_num_rows($result) == 0){
		return true;
	} else {
		return false;
	}
}



?>
