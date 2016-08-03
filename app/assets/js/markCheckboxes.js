$(function(){
    $('#checkAll').click(function(){
        $('input[type=checkbox]').each(function(){
            name = $(this).attr('name');
            if(name.indexOf('_permission_') != -1){
                $(this).prop('checked', true);
            }
        });
    });

    $('#uncheckAll').click(function(){
        $('input[type=checkbox]').each(function(){
            name = $(this).attr('name');
            if(name.indexOf('_permission_') != -1){
                $(this).prop('checked', false);
            }
        });
    });
});