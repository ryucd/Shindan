<?
session_start();

include "setting.php";

print <<< EOF
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>一覧表示</title>
</head>
<body>
<table>
<tr><th>診断</th><th>作成者</th></tr>
EOF;

if(isset($_POST['search'])){
	$search = $_POST['search'];
	$result = get_questions_with_search($search);
} else {
	$result = get_questions();
}
$num = pg_num_rows($result);
for($i = 0; $i<$num; $i++){
	$row = pg_fetch_assoc($result, $i);
	print "<tr>";
	print "<td><a href='diagnosis.php?id=".$row['id']."'>".htmlspecialchars($row['content'])."</a></td>";
	print "<td>{$row['login_name']}</td>";
	print "</tr>\n";
}
print <<< EOF
</table>
</body>
</html>
EOF;


function get_questions(){
	$db = new mydb();
	$query = "select c.id, c.content, m.login_name from crystal c, member m where c.m_id = m.id";
	$result = $db->query($query);
	return $result;
}

function get_questions_with_search($search){
	$db = new mydb();
	$query = "select c.id, c.content, m.login_name from crystal c, member m where c.m_id = m.id and c.content like $1";
	$result = $db->query($query, array("%".$search."%"), "search");
	return $result;
}
?>