$(function(){

    if(!$('#toFixed').length) {
        $('#variable').hide();
        $('input[name=is_variable').change(function () {
            if ($(this).val() == 1) {
                $('#variable').show();
                $('#valueLabel').html('Valor da parcela');
            } else {
                $('#variable').hide();
                $('#valueLabel').html('Valor (aprox.)');
            }
        })
    }else{
        $('#toVar').change(function () {
            if ($(this).prop('checked')) {
                $('#variable').show();
                $('#valueLabel').html('Valor da parcela');
            } else {
                $('#variable').hide();
                $('#valueLabel').html('Valor (aprox.)');
            }
        })
        $('#toFixed').change(function () {
            if ($(this).prop('checked')) {
                $('#variable').hide();
            } else {
                $('#variable').show();
            }
        })
    }
})