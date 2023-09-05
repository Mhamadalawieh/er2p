var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};
function poperror(text, time = 3000){
    $('#error-popup-block').fadeIn(150);
    $('#error-popup-block').find('.popup-text').html(text);
    setTimeout(function(){
        $('#error-popup-block').fadeOut(150);
    }, time)
}
function popsuccess(text, time = 3000){
    $('#succes-popup-block').fadeIn(150);
    $('#succes-popup-block').find('.popup-text').html(text);
    setTimeout(function(){
        $('#succes-popup-block').fadeOut(150);
    }, time)
}


$( document ).ready(function() {
    $('#products-cel').on('click', function(){
        if($('#menu-products').is(":visible")){
            $('#menu-products').fadeOut(100);
        } else {
            $('#menu-products').fadeIn(100);
        }
    })
});