$(function(){

    $('.datatable').each(function(){
        if(typeof $(this).attr('default-quantity') != 'undefined')
            quantity = $(this).attr('default-quantity');
        else
            quantity = 25;

        opts = {
            "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
            "iDisplayLength": quantity,
            "aaSorting": [],
            "serverside" : false,
            "language": {
                "url": "plugins/datatables/datatables.portuguese.lang"
            }
        }
        $(this).dataTable(opts);
    })


})