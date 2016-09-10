$(function(){
	$('select').each(function(){
	    if(!$(this).hasClass('noselect2')) {
            $(this).select2({
                language: 'pt-BR'
            });
        }
	})
})