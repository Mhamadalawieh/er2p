$( document ).ready(function() {

    $(document).click(function(event) {
        if (!$(event.target).is(".input-text-block, .text, .text-content, .text-title, .text-icon, .input-text, .text-left")) {
            $('.input-text-block').hide()
            $('.text-icon-up').hide();
            $('.text-icon-down').show();
        }
    });

    $('.tab').on('click', function(){
        let url = '/dashboard-er2p/textes/get';
        let page = $(this).data('page');
        $('#page-name').html('"' + page + '" ')
        console.log(page)
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                page: page,
            },
            success: function (pages) {
                let html = '';
                $.each(pages, function(key, value) {
                    let name = value['label'];
                    if(localStorage.getItem('devMode') && localStorage.getItem('devMode') == "true") {
                        name = value['name'];
                    }
                    html += '<div class="text-block"><div class="text noselect"><div class="text-left"><div class="text-title">' + name +'</div>';
                    html += '<div class="text-content">' + value['content'] +'</div></div>';
                    html += '<div class="text-buttons"><div class="button-delete" data-id="' + value['id'] + '"><i class="fa-solid fa-trash-can"></i></div><div id="text-icons"><i class="fa-solid fa-angle-down text-icon text-icon-down"></i><i class="fa-solid fa-angle-up text-icon text-icon-up"></i></i></div></div>';
                    html += '</div><div class="input-text-block"><div class="text-textarea">Modifiez le contenu du texte "' + value['name'] + '" de la page ' + value['page'] + ':</div><textarea class="input-text" resize="no">' + value['content'] +'</textarea>';
                    html += '<div class="text-save-btn btn" data-id="' + value['id'] + '">Enregistrer</div>';
                    html += '</div></div>';
                })
                $('#list').html(html)
                $('#list').fadeIn(100);
                $('#text-list').show();
                if(localStorage.getItem('devMode') == 'true') {
                    $('.button-delete').fadeIn(150);
                }
            },
        });
    })

    $(document).on('click', '.text', function(event){
        if($(this).siblings('.input-text-block').is(":visible")){
            $(this).siblings('.input-text-block').css('display', 'none');
            $(this).siblings('.input-text-block').css('display', 'none');
            $(this).find('.text-icon-down').show();
            $(this).find('.text-icon-up').hide();
        } else {
            $('.input-text-block').hide()
            $('.text-icon-up').hide();
            $('.text-icon-down').show();
            $(this).siblings('.input-text-block').css('display', 'flex');
            $(this).find('.text-icon-down').hide();
            $(this).find('.text-icon-up').show();
        }
    })

    $(document).on('click', '.button-delete', function(){
        let dom = $(this);
        let id = $(this).data('id');
        let url = '/dashboard-er2p/textes/delete';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: id,
            },
            success: function (result) {
                dom.parents('.text-block').remove();
                dbsuccess('Texte supprimé avec succès')
            },
        });
    })

    $(document).on('click', '.text-save-btn', function(){
        let thisDom = $(this);
        let id = $(this).data('id');
        let content = $(this).siblings('.input-text').val();
        let url = '/dashboard-er2p/textes/update';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: id,
                content: content,
            },
            success: function (result) {
                thisDom.parent().css('display', 'none');
                thisDom.parents('.text-block').find('.text-content').html(content);
                dbsuccess('Texte modifié avec succès')
            },
        });
    })

    checkDevmode();
});

function checkDevmode(){
    // Bouton du mode developpeur
    $('.dev-icon-cel').on('click', function() {
        if (localStorage.getItem('devMode')) {
            if(localStorage.getItem('devMode') == "true") {
                $('.button-delete').fadeIn(150);
            } else {
                $('.button-delete').fadeOut(150);
            }
        } else {
            $('.button-delete').fadeOut(150);
        }
    });
}