<?php
session_start();

if(!isset($_SESSION['id'])){
	include "setting.php";
	gotoindex();
}
$_GET['pagename'] ='posting';
include "header.php";

$posting_content = "";
$posting_question = "";
$posting_choice = array('');
$posting_answer = array('');

if(isset($_COOKIE['posting_content'])){
	$posting_content = $_COOKIE['posting_content'];
}
if(isset($_COOKIE['posting_question'])){
	$posting_question = $_COOKIE['posting_question'];
}
if(isset($_COOKIE['posting_choice'])){
	$posting_choice = $_COOKIE['posting_choice'];
}
if(isset($_COOKIE['posting_answer'])){
	$posting_answer = $_COOKIE['posting_answer'];
}

print <<< EOF
<form method="POST" action="./add_posting.php">
診断質問 :<input type="text" size="80%" name="content" value="{$posting_content}"}><br>
問題  :<input type="text" size="80%" name="question" value="{$posting_question}"><br>
<div id='choices'>
EOF;
if(isset($_COOKIE['posting_choice'][0])){
	$num = max(max(array_keys($posting_choice)), max(array_keys($posting_answer)));
	for($i = 0; $i <= $num; $i++){
		$a = "";
		$b = "";
		if(isset($posting_choice[$i])) $a = $posting_choice[$i];
		if(isset($posting_answer[$i])) $b = $posting_answer[$i];
		print <<< EOF
			<div class="ch">
			選択肢 :<input type="text" size="30%" name="choice[]" value="{$a}">
			答え:<input type="text" size="30%" name="answer[]" value="{$b}"><br>
			</div>
EOF;
	}
} else {
		print <<< EOF
<div class="ch">
選択肢 :<input type="text" size="30%" name="choice[]">
 答え:<input type="text" size="30%" name="answer[]"><br>
 </div>
EOF;
}
print <<< EOF
</div>
<span id="addbutton">選択肢を追加</span><br>
<span id="deletebutton">選択肢を削除</span><br>
 <input type="submit" value="送信">
</form>
EOF;
 
 include "footer.php";

 ?>
