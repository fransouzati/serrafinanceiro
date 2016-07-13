$(function(){
    $('.filter').on('click', function(){
        type = $(this).attr('filter-type');
        el = $(this);

        // Gray all elements of this type
        gray(type);

        // Blue this element
        el.removeClass('label-default');
        el.addClass('label-primary');
        
        // Set the filter value
        $('input[name=_filter_'+type+']').val(el.attr('value'));
    })

    $('.filter-input').each(function(){
        val = $(this).val();
        type = $(this).attr('filter-type');
        
        gray(type);

        $('span[filter-type='+type+'][value='+val+']').removeClass('label-default');
        $('span[filter-type='+type+'][value='+val+']').addClass('label-primary');

    })

})

function gray(type){
    $('.filter').each(function(){
        if($(this).attr('filter-type') == type) {
            $(this).removeClass('label-primary');
            $(this).removeClass('label-default');
            $(this).addClass('label-default');
        }
    })
}