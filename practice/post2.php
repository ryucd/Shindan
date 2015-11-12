<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>POST sample2</title>
</head>
<body>

<?
	print $_POST['name']."さんからのコメント<br>";
	print "性別：". $_POST['sex'] . "<br>";
	print "学習済プログラミング言語：";
	$langs = $_POST['lang'];
	foreach($langs as $lang){
		print $lang;
	}
	print "<br>";
	print $_POST['comment']."<br>";
?>

</body>
</html>