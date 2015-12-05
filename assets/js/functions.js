
$('#addbutton').click(function(){
	if($("#choices .ch").length >= 10) {
		return;
	}
	$choice =  "<div class='ch'>選択肢:<input type='text' size='30%' name='choice[]'><br>\n性別度合い :<input type='number' min='-100' max='100' size='30%' name='answer[]' value='0'><br></div>\n";
	$('#choices').append($choice);
});

$('#deletebutton').click(function(){
	if($("#choices > .ch:last").get(0) == $("#choices > .ch:first").get(0)) return;
	$("#choices > .ch:last").remove();
});

$(function(){
	if($("input[type=text]").change(function(){
		$(window).on('beforeunload', function() {
			return '診断の追加が完了していません。このまま移動しますか？';
		});
	}));


	$("input[type=submit]").click(function(){
		$(window).off('beforeunload');
	});
	
});
