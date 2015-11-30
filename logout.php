<?
session_start();
if(!isset($_SESSION['id'])){
	include "setting.php";
	gotoindex();
}
session_destroy();
?>

<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<title>ログアウト</title>
</head>
<body>
ログアウトしました。<br>
<a href="index.php">TOPへ</a>
</body>
</html>