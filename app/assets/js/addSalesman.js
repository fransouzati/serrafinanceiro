$(function(){
    $('#_select_salesman').change(function(){

        $.ajax({
            type: "GET",
            url: "index.php",
            data: {ctrl: "salesman", act: "getPercentage", param: $(this).val()}
        }).done(function (percentage) {
            $('#_percentage_salesman').val(percentage);
        });
    })
})