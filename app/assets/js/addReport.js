$(function () {
    $('#all').on('change', function(){
        if($(this).prop('checked')){
            $('#period').attr('disabled', true);
            $('#period').removeAttr('required');
        }else{
            $('#period').attr('required', true);
            $('#period').removeAttr('disabled');
        }
    })
})