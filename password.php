<?
session_start();

if(!isset($_SESSION['id'])){
	exit(0);
} else {
	print <<< EOF
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>データ入力</title>
</head>
<body>
	<form action="./change_pwd.php" method="POST">
	現在のパスワード <input type="password" name="pwd"><br>
	新しいパスワード <input type="password" name="newpwd"><br>
	<input type="submit" value="送信">
	</form>
</body>
</html>
EOF;
}
?>