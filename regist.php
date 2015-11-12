<?php
include "setting.php";

$login_name = $_POST["login_name"];
$pwd = $_POST["pwd"];
$hashpwd = password_hash($pwd, PASSWORD_DEFAULT);
$db = new mydb();

if(check_exist_user($db, $login_name) == true){
	$query = "INSERT INTO member (login_name,pwd) VALUES($1, $2)";
	$result = pg_prepare ($conn, "my_query", $query);
	$result = pg_execute ($conn, "my_query",array($login_name,$hashpwd));
	if($result == false){
		print "登録に失敗しました。";
	}
} else {
	print "指定されたユーザー名は利用できません。";
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