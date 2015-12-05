<?php
session_start();

include "setting.php";
if(!isset($_SESSION['id']) || !isset($_SESSION['ipaddress'])){
	gotoindex();
}
check_login();
$_GET['pagename'] ='posting';
include "header.php";

$posting_content = "";
$posting_question = "";
$posting_choice = array('');
$posting_answer = array('');

if(isset($_COOKIE['posting_content'])){
	$posting_content = htmlspecialchars($_COOKIE['posting_content']);
}
if(isset($_COOKIE['posting_question'])){
	$posting_question = htmlspecialchars($_COOKIE['posting_question']);
}
if(isset($_COOKIE['posting_choice'])){
	$posting_choice = $_COOKIE['posting_choice'];
}
if(isset($_COOKIE['posting_answer'])){
	$posting_answer = $_COOKIE['posting_answer'];
}

print <<< EOF
※性別度合いには、-100〜100までの数値を記入してください。<br>
女性度100%:-100 〜 100:男性度100%となります。<br>
<form method="POST" action="./add_posting.php">
診断のタイトル :<input type="text" size="80%" name="content" value="{$posting_content}"}><br>
質問内容  :<input type="text" size="80%" name="question" value="{$posting_question}"><br>
<div id='choices'>
EOF;
if(isset($_COOKIE['posting_choice'][0])){
	$num = max(max(array_keys($posting_choice)), max(array_keys($posting_answer)));
	for($i = 0; $i <= $num; $i++){
		$a = "";
		$b = "0";
		if(isset($posting_choice[$i])) $a = htmlspecialchars($posting_choice[$i]);
		if(isset($posting_answer[$i])) $b = htmlspecialchars($posting_answer[$i]);
		print <<< EOF
			<div class="ch">
			選択肢 :<input type="text" size="30%" name="choice[]" value="{$a}">
			性別度合い:<input type="number" min="-100" max="100" size="30%" name="answer[]" value="{$b}"><br>
			</div>
EOF;
	}
} else {
		print <<< EOF
<div class="ch">
選択肢 :<input type="text" size="30%" name="choice[]">
性別度合い:<input type="number" min="-100" max="100" size="30%" name="answer[]" value="0"><br>
 </div>
EOF;
}
print <<< EOF
</div>
<hr>
<button type="button" id="addbutton" style="margin-right: 60px;">選択肢を追加</button>
<button type="button" id="deletebutton">選択肢を削除</button><br><br>
 <input type="submit" value="送信">
</form>
EOF;
 
include "footer.php";

 ?>
