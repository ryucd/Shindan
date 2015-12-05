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
		if($i >= $list.length) break;
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
$(document).on('click', '.number', function(){
	print_list($(this).data('n'));
});

function print_move($s){
	$("#nav_list").html("");
	if($s-$list_max >= 0){
		$("#nav_list").append("<div id='prev' style='float: left; width:100px; text-align:left'>前へ</div>");
	}else{
		$("#nav_list").append("<div style='float: left; width:100px; text-align-left'>&nbsp;&nbsp;&nbsp;&nbsp;</div>");
	}
	if($s+$list_max+1 <= $list.length){
		$("#nav_list").append("<div id='next' style='float: right; text-align:right; width: 100px;'>次へ</div>");
	} else {
		$("#nav_list").append("<div style='float: right; text-align: right; width: 100px'>&nbsp;&nbsp;&nbsp;&nbsp;</div>");
	}
	var i = 0;
	for(i = 0; i < $list.length-1; i+=$list_max){
		
		$("#nav_list").append("<div style='float: center; display: inline-block; width: 30px; margin:0 10px 0 10px;'>"+(i/$list_max+1)+"</div>");
		$("#nav_list div:last").attr('data-n', i);
		$("#nav_list div:last").attr('class', 'number');
		if(i == $list_count){
			$("#nav_list div:last").css('background-color', 'skyblue');
		}
	}
}
