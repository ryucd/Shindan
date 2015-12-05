<?php
	session_start();
	include "setting.php";

	if(!isset($_SESSION['id']) || !isset($_SESSION['ipaddress'])){
		gotoindex();
	}

	check_login();
	
	$_GET['pagename'] = 'search';
	include "header.php";
	
	print <<< EOF
<form action="./list.php" method="POST" id="search">
検索：<input type="text" name="search" id="query"><br>
<input type="submit" value="検索">
<span id="error" style="color:red"></span>
</form><br>
<div id="all_list"></div>
<div id="nav_list" style='text-align: center'></div>
EOF;

	include "footer.php";
	
?>
