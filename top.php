<?
session_start();
include "setting.php";

if(!isset($_SESSION['id'])){
	gotoindex();
}
$_GET['pagename'] = 'top';
include "header.php";

print <<< EOF
<article>
<h2>最近行った診断</h2>
</article>

EOF;


include "footer.php";

?>