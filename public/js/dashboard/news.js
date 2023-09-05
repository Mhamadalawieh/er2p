$( document ).ready(function() {

    $(document).click(function(event) {
        if (!$(event.target).is(".input-actuality-block, .actuality, .actuality-content, .actuality-title, .actuality-icon, .input-actuality, .actuality-left")) {
            $('.input-actuality-block').hide()
            $('.actuality-icon-up').hide();
            $('.actuality-icon-down').show();
        }
    });

    $(document).on('click', '.actuality', function(event){
        if($(this).siblings('.input-actuality-block').is(":visible")){
            $(this).siblings('.input-actuality-block').css('display', 'none');
            $(this).siblings('.input-actuality-block').css('display', 'none');
            $(this).find('.actuality-icon-down').show();
            $(this).find('.actuality-icon-up').hide();
        } else {
            $('.input-actuality-block').hide()
            $('.actuality-icon-up').hide();
            $('.actuality-icon-down').show();
            $(this).siblings('.input-actuality-block').css('display', 'flex');
            $(this).find('.actuality-icon-down').hide();
            $(this).find('.actuality-icon-up').show();
        }
    })

    $(document).on('click', '.button-delete', function(){
        let dom = $(this);
        let id = $(this).data('id');
        let url = '/dashboard-er2p/actus/delete';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: id,
            },
            success: function (result) {
                dom.parents('.actuality-block').remove();
                dbsuccess('Actualité supprimée avec succès')
            },
        });
    })

    checkDevmode();
});
