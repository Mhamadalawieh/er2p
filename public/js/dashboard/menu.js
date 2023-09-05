$( document ).ready(function() {

    // Chargement de la page : gestion du mode dev
    if(localStorage.getItem('devMode') == 'true'){
        $('.cel-active-dev').addClass('cel-active');
        $('.devmode').show();
    }

    // Bouton du mode developpeur
    $('.dev-icon-cel').on('click', function() {
        if (localStorage.getItem('devMode')) {
            if(localStorage.getItem('devMode') == "true") {
                localStorage.setItem('devMode', false)
                $('.cel-active-dev').removeClass('cel-active');
                $('.devmode').fadeOut(150);
            } else {
                localStorage.setItem('devMode', true)
                $('.cel-active-dev').addClass('cel-active');
                $('.devmode').fadeIn(150);
            }
        } else {
            localStorage.setItem('devMode', true)
        }
    });



});
function dberror(text, time = 3000){
    $('#error-popup-block').fadeIn(150);
    $('#error-popup-block').find('.popup-text').html(text);
    setTimeout(function(){
        $('#error-popup-block').fadeOut(150);
    }, time)
}
function dbsuccess(text, time = 3000){
    $('#succes-popup-block').fadeIn(150);
    $('#succes-popup-block').find('.popup-text').html(text);
    setTimeout(function(){
        $('#succes-popup-block').fadeOut(150);
    }, time)
}
