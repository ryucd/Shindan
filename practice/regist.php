<?php
$login_name = $_POST["login_name"];
$pwd = $_POST["pwd"];
$hashpwd = password_hash($pwd, PASSWORD_DEFAULT);
$conn = pg_connect ("host=localhost dbname=j132080r user=j132080r");
$query = "INSERT INTO member (login_name,pwd) VALUES($1, $2)";
$result = pg_prepare ($conn, "my_query", $query);
$result = pg_execute ($conn, "my_query",array($login_name,$hashpwd));
?>