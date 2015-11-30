<?php
	session_start();
	if(!isset($_SESSION['id'])){
		include "setting.php";
		gotoindex();
	}
	
	$_GET['pagename'] = 'list';
	include "header.php";
	print "<div id='all_list'></div>";
	print "<div id='nav_list'></div>";
	include "footer.php";
?>