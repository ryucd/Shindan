<?php
	session_start();
	include "setting.php";
	if(!isset($_SESSION['id']) || !isset($_SESSION['ipaddress'])){
		gotoindex();
	}
	check_login();
	
	$_GET['pagename'] = 'list';
	include "header.php";
	print "<div id='all_list'></div>";
	print "<div id='nav_list' style='text-align: center'></div>";
	include "footer.php";
?>
