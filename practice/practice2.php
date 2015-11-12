<?php
print <<< EOF
<html>
<head>
<title>HTML practice</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
</head>

<body>
<h1>PHPの練習をしよう！</h1>
EOF;

for($i = 1; $i <= 6; $i++){
	print "<h$i> $i 周目のループ</h$i>\n";
}

print "</body></html>";
?>