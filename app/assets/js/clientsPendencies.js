$(function(){
    
    $('.pendencies-modal').on('click', function(){

        $('#viewPendenciesModal').modal('toggle');
        client = $(this).attr('client');

        clearModal();

        $.ajax({
            type: "GET",
            url: "index.php",
            data: {ctrl: "client", act: "pendenciesModal", param: client}
        }).done(function (json) {
            json = $.parseJSON(json);
            populateModal(json);
        })
    })

})

function clearModal(){
    $('#_client_name').text('');
    $('#tbody-pendencies').html('');
}

function populateModal(json){
    $('#_client_name').text(json.name);
    $('#_finances_obs').text(json.obs);

    $.each(json.pendencies, function (index, pendency) {
        $('#tbody-pendencies').append(
            '<tr>' +
                '<td>' + pendency.type + '</td>' +
                '<td>' + pendency.value  + '</td>' +
                '<td>' + pendency.expiry + '</td>' +
            '</tr>'
        );
    });
}