$(function(){
    $('.mask-date').each(function(){
        $(this).datepicker({
            format : 'dd/mm/yyyy',
        });
        if($(this).val() == '')
            $(this).datepicker('setValue', moment());
    })
})