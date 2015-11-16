<?
session_start();

if(!isset($_SESSION['id'])){
	print "<a href='input.php'>新規登録</a><br>";
	print "<a href='login.php'>ログイン</a><br>";
}else {
	print $_SESSION['login_name']."さんようこそ！<br>";
	print "<a href='list.php'>診断一覧</a><br>";
	print "<a href='search.php'>検索</a><br>";
	print "<a href='posting.php'>診断追加</a><br>";
	print "<a href='password.php'>パスワード変更</a><br>";
	print "<a href='logout.php'>ログアウト</a><br>";
}
?>