$(function(){
    $('.mask-dateinterval').each(function(){
        $(this).daterangepicker({
            locale: {
                format: 'DD/MM/YYYY'
            }

        });
    })
})