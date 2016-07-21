$(function(){
    $('#filter').on('select2:close', function (evt) {
        switch($(this).val()){
            case 'no':
                $('.client').each(function(){
                    $(this).show();
                });
                break;
            case 0:
                $('.client').each(function(){
                    $(this).hide();
                });
                $('#0').show();
                break;
            default:
                $('.client').each(function(){
                    $(this).hide();
                });
                $('#' + $(this).val()).show();
                break;
        }
    });
})