$(function () {

    // Installments
    qttInstallments = $('#qttInstallments').val();
    if (typeof $('#qttInstallments').prop('min') == 'undefined')
        minInstallments = 0;
    else
        minInstallments = $('#qttInstallments').prop('min');

    $('#addInstallment').click(function () {
        qttInstallments++;
        $.ajax({
            type: "GET",
            url: "index.php",
            data: {ctrl: "project", act: "addInstallmentForm", param: qttInstallments}
        }).done(function (div) {
            $('#rowInstallments').append(div);
            $('#qttInstallments').val(qttInstallments);
            maskAgain();
        });

    })
    $('#removeInstallment').click(function () {
        if (qttInstallments > minInstallments) {
            $('#installment' + qttInstallments).remove();
            qttInstallments--;
            $('#qttInstallments').val(qttInstallments);
        }
        maskAgain();
    })

    $('body').on('click', 'button.btnRemove', function () {
        id = parseInt($(this).attr('id'));
        if (id < qttInstallments) {
            for (i = id + 1; i <= qttInstallments; i++) {
                $('#lblQtt' + i).html((parseInt(i) - 1) + '.');

                $('#lblValue' + i).attr('for', 'value' + (parseInt(i) - 1));
                $('#lblValue' + i).attr('id', 'lblValue' + (parseInt(i) - 1));
                $('#iptValue' + i).attr('name', 'value' + (parseInt(i) - 1));
                $('#iptValue' + i).attr('id', 'iptValue' + (parseInt(i) - 1));

                $('#lblExpiry' + i).attr('for', 'expiry' + (parseInt(i) - 1));
                $('#lblExpiry' + i).attr('id', 'lblExpiry' + (parseInt(i) - 1));
                $('#iptExpiry' + i).attr('name', 'expiry' + (parseInt(i) - 1));
                $('#iptExpiry' + i).attr('id', 'iptExpiry' + (parseInt(i) - 1));
                $('#iptExpiry' + i).addClass('expiry');

                $('#lblStatus' + i).attr('for', 'status' + (parseInt(i) - 1));
                $('#lblStatus' + i).attr('id', 'lblStatus' + (parseInt(i) - 1));
                $('#iptStatusok' + i).attr('name', 'status' + (parseInt(i) - 1));
                $('#iptStatusok' + i).attr('id', 'iptStatusok' + (parseInt(i) - 1));
                $('#iptStatusnok' + i).attr('name', 'status' + (parseInt(i) - 1));
                $('#iptStatusnok' + i).attr('id', 'iptStatusnok' + (parseInt(i) - 1));

                $('#' + i).attr('id', (parseInt(i) - 1));
                $('#lblQtt' + i).attr('id', 'lblQtt' + (parseInt(i) - 1));

                $('#installment' + i).attr('id', 'installment' + (parseInt(i) - 1));
            }
        }

        $('#installment' + id).remove();
        qttInstallments = qttInstallments - 1;
        $('#qttInstallments').val(qttInstallments);
        maskAgain();
    });

    $('#calculateDates').on('click', function () {
        if(typeof $('.firstInstallment') != undefined)
            initialDate = $('.firstInstallment').val();
        else
            return;

        isFirst = true;

        if(initialDate == '')
            return;

        
        if (initialDate != '' && $('.expiry').length > 0) {

            $('.expiry').each(function () {
                if(!isFirst)
                    $(this).val(nextMonth(prev.val(), false));
                prev = $(this);
                isFirst = false;
            })
        }
    });


});

function nextMonth(date, br){
    if(br) {
        month = parseInt(date.split('/')[1]);
        year = parseInt(date.split('/')[2]);
        day = parseInt(date.split('/')[0]);
    }else{
        month = parseInt(date.split('-')[1]);
        year = parseInt(date.split('-')[0]);
        day = parseInt(date.split('-')[2]);
    }

    if (month == 12) {
        month = 01;
        year = year + 1;
    } else {
        month = month + 1;
    }
    if(month < 10)
        month = '0'+month;

    if(day < 10)
        day = '0' + day;
    return year + '-' + month + '-' + day;
}

function maskAgain() {
    $('.mask-money').each(function () {
        if ($(this).val() == '')
            $(this).maskMoney({thousands: '.', decimal: ',', allowZero: true, prefix: 'R$'});
    })
}