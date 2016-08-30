
function confirmLink(e){
    if(e.hasClass('confirm-link')){
        return confirm('Você tem certeza?');
    }else{
        return true;
    }
}