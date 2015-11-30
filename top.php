<?
session_start();
include "setting.php";

if(!isset($_SESSION['id'])){
	gotoindex();
}
$_GET['pagename'] = 'top';
include "header.php";

include "footer.php";

?>