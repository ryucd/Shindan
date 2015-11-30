$list_flag = 0;
$list_count = 0;
$list_max = 5;

	$.ajax({
		type: 'GET',
		url: 'list.php',
		dataType: 'html',
		success: function(data){
			$list = data.split('\n');
			if($list[0] == '') $list_flag = -1;
			else $list_flag = 1;
			print_list(0);
		}
	});

function print_list($s){
	if($list_flag != 1) return;
	$("#all_list").html("");
	$("#all_list").append("<table><tr><th>診断</th><th>作成者</th><th>作成日時</th></tr></table>");
	var $i = $s;
	for($i; $i < $list_max+$s; $i++){
		if($i > $list.length) break;
		$("#all_list table").append($list[$i]);
	}
	$list_count = $s;
	print_move($s);
}

$(document).on('click', '#prev', function(){
	print_list($list_count-$list_max);
});
$(document).on('click', '#next', function(){
	print_list($list_count+$list_max);
});

function print_move($s){
	$("#nav_list").html("");
	if($s != 0){
		$("#nav_list").append("<div id='prev' style='float: left; text-align:left'>前へ</div>");
	}
	if($s+$list_max < $list.length-1){
		$("#nav_list").append("<div id='next' style='text-align:right'>次へ</div>");
	}
}