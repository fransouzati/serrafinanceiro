$(function () {
    $('a').click(function (event) {
        event.preventDefault();
        if(!confirmLink($(this))){
            return false;
        }
        url = $(this).attr('href');
        if(typeof $(this).attr('target') != 'undefined'){
            blank = true;
        }else{
            blank = false;
        }
        urlOriginal = url;
        controlador = '';
        acao = '';
        if (typeof url != 'undefined') {
            url = url.split('/');
            if (url[url.length - 1] != '#' && urlOriginal.indexOf('#') == -1) {
                controller = url[0];
                if (typeof url[0] != 'undefined' && typeof url[1] != 'undefined') {
                    controlador = url[0];
                    acao = url[1];
                    if(acao == '')
                        acao = 'view';

                    $.ajax({
                        type: "GET",
                        url: "index.php",
                        data: {ctrl: "app", act: "permission", controlador: controlador, funcao: acao}
                    }).done(function (result) {
                        if (result == 0) {
                            swal({
                                title: 'Ops!',
                                text: 'Você não possui permissão para acessar esta página!',
                                showCancelButton: true,
                                showConfirmButton: false,
                                cancelButtonText: "Ok",
                                timer: 2000,
                                type: 'error'
                            });
                        } else {
                            if(blank){
                                window.open(urlOriginal);
                            }else {
                                $(location).attr('href', urlOriginal)
                            }
                        }
                    })
                }else{
                    if(blank){
                        window.open(urlOriginal);
                    }else {
                        $(location).attr('href', urlOriginal)
                    }
                }
            }

        }


    });
});