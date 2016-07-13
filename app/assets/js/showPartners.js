$(function(){
    $('#partner').hide();
    $('#type').on('select2:close', function(){
        var needPartner = $('#type').find(":selected").attr('partner');
        if(needPartner == 1){
            $('#partner').show();
        }else{
            $('#partner').hide();
        }
    })
})