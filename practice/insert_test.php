<?
$conn = pg_connect("host=localhost dbname=j132080r user=j132080r");
$query = "insert into member (login_name,pwd) values($1, $2)";

$result = pg_prepare($conn, "my_query", $query);
$result = pg_execute($conn, "my_query", array("test", "pass"));

?>