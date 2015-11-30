<?php
	session_start();
	
	if(!isset($_SESSION['id'])){
		include "setting.php";
		gotoindex();
	}
	
	$_GET['pagename'] = 'search';
	include "header.php";
	
	print <<< EOF
<form action="./list.php" method="POST" id="search">
検索：<input type="text" name="search" id="query"><br>
<input type="submit" value="検索">
<span id="error" style="color:red"></span>
</form>
<div id="all_list"></div>
<div id="nav_list"></div>
EOF;

	include "footer.php";
	
?>