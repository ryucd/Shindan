<?
include 'setting.php';

$db = new mydb();

$a = $db->query("INSERT INTO member (login_name,pwd) VALUES($1, $2)", array("user", "password"));
?>