$( document ).ready(function() {

    $('.info-cel').on('click', function(){
        let id = '#info-description-' + $(this).data('cel');


        $('.info-description').hide();
        $(id).fadeIn(150);

        $('#info-title').html($(this).html())

    })

});