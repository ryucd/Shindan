
$('#addbutton').click(function(){
	$choice =  "<div class='ch'>選択肢:<input type='text' size='30%' name='choice[]'><br>\n答え :<input type='text' size='30%' name='answer[]'><br></div>\n";
	$('#choices').append($choice);
});

$('#deletebutton').click(function(){
	if($("#choices > .ch:last").get(0) == $("#choices > .ch:first").get(0)) return;
	$("#choices > .ch:last").remove();
});

$(function(){
	var isChanged = false;
	if($("input").change(function(){
		isChanged = true;
	}));
	
    $(window).on('beforeunload', function() {
        if(isChanged){
			return '診断の追加が完了していません。このまま移動しますか？';
		}
    });
});