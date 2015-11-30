<?
session_start();

if(!isset($_SESSION['id'])){
	include "setting.php";
	gotoindex();
} else {
	include "header.php";
	print <<< EOF
	<form action="./change_pwd.php" method="POST">
	現在のパスワード <input type="password" name="pwd"><br>
	新しいパスワード <input type="password" name="newpwd"><br>
	<input type="submit" value="送信">
	</form>
EOF;
	include "footer.php";
}
?>