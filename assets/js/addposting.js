$(function(){
    $(window).on('beforeunload', function() {
        return '診断の追加が完了していません。このまま移動しますか？';
    });
});