$(function(){
    $('html').on('shown.bs.modal', function (e) {

    })
    $('.installments-modal').on('click', function(){
        $('#viewInstallmentModal').modal('toggle');
        project = $(this).attr('project');

        clearModal();

        $.ajax({
            type: "GET",
            url: "index.php",
            data: {ctrl: "project", act: "installmentsModal", param: project}
        }).done(function (json) {
            json = $.parseJSON(json);
            populateModal(json);
        })
    })

})

function clearModal(){
    $('#_project_title').text('');
    $('#tbody-installments').html('');
}

function populateModal(json){
    $('#_project_title').text(json.title);

    $.each(json.pendencies, function (index, installment) {
        $('#tbody-installments').append(
            '<tr>' +
                '<td>' + installment.number + '</td>' +
                '<td>' + installment.value  + '</td>' +
                '<td>' + installment.expiry + '</td>' +
            '</tr>'
        );
    });
}