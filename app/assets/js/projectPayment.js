$(function(){
    
    $('.payment-modal').on('click', function(){

        installment = $(this).data('installment');
        clearModal();

        $.ajax({
            type: "GET",
            url: "index.php",
            data: {ctrl: "project", act: "payInstallmentModal", param: installment}
        }).done(function (json) {
            json = $.parseJSON(json);
            populateModal(json);
            $('#payInstallmentModal').modal('toggle');
        })
    })

})

function clearModal(){
    $('#_client_name').text('');
    $('#_installment_value').val('');
    $('#_form_payment').attr('action', '');
}

function populateModal(json){
    $('#_client_name').text(json.name);

    $('#_installment_value').val(json.value);

    $('#_form_payment').attr('action', json.action);
}