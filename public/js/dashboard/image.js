$( document ).ready(function() {

    $(document).click(function(event) {
        if (!$(event.target).is(".input-image-block, .image, .image-content, .image-title, .image-icon, .input-image, .image-left")) {
            $('.input-image-block').hide()
            $('.image-icon-up').hide();
            $('.image-icon-down').show();
        }
    });

    $('.tab').on('click', function(){
        let url = '/dashboard-er2p/images/get';
        let page = $(this).data('page');
        $('#page-name').html('"' + page + '" ')
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
                    html +='        <div class="image-block">' +
                        '                <div class="img-image" id="img-image-' + value['id'] + '" style="background-image: url(\'/images/' + value['path'] + '\')"></div>' +
                        '                <div class="img-name">' +
                        name +
                        '                </div>' +
                                        '<form class="form-edit">' +
                                        '  <label for="edit-file-' + value['id'] + '" title="Modifier l\'image">' +
                                        '   <div class="img-edit-btn img-btn">' +
                                        '     <i class="fas fa-pen"></i>' +
                                        '   </div>' +
                                        '  </label>' +
                                        '  <input class="edit-file" id="edit-file-' + value['id'] + '" name="edit-file-' + value['id'] + '" type="file" accept="image/png, image/gif, image/jpeg" data-id="' + value['id'] + '"/>' +
                                        '</form>' +
                        '                <div class="img-delete-btn img-btn button-delete" data-id="' + value['id'] + '">' +
                        '                    <i class="fas fa-trash"></i>' +
                        '                </div>' +
                        '            </div>';
                })
                $('#list').html(html)
                $('#list').fadeIn(100);
                if(localStorage.getItem('devMode') == 'true') {
                    $('.button-delete').fadeIn(150);
                }
                $('#image-list').show();
            },
        });
    })

    $(document).on('click', '.image', function(event){
        if($(this).siblings('.input-image-block').is(":visible")){
            $(this).siblings('.input-image-block').css('display', 'none');
            $(this).siblings('.input-image-block').css('display', 'none');
            $(this).find('.image-icon-down').show();
            $(this).find('.image-icon-up').hide();
        } else {
            $('.input-image-block').hide()
            $('.image-icon-up').hide();
            $('.image-icon-down').show();
            $(this).siblings('.input-image-block').css('display', 'flex');
            $(this).find('.image-icon-down').hide();
            $(this).find('.image-icon-up').show();
        }
    })

    $(document).on('click', '.button-delete', function(){
        let dom = $(this);
        let id = $(this).data('id');
        let url = '/dashboard-er2p/images/delete';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: id,
            },
            success: function (result) {
                dom.parents('.image-block').remove();
                dbsuccess('Image supprimée avec succès')
            },
        });
    })

    // Bouton d'import mrt
    $('body').on('change', ".edit-file", function(e){
        let fd = new FormData();
        let files = $(this)[0].files;
        let id = $(this).data('id');
        fd.append('image',files[0])
        fd.append('id',id)
        if(files.length > 0 ){
            $.ajax({
                url: "/dashboard-er2p/images/update",
                type: 'POST',
                async: false,
                timeout: 30000,
                data: fd,
                contentType: false,
                processData: false,
                dataType: "json",
                error: function(e){
                    console.log(e);
                    return "error";
                },
                success: function(result){
                    console.log(result)
                    let dom = '#img-image-' + id;
                    $(dom).css('background-image', 'url(/' + result + ')');
                    dbsuccess('Image modifiée avec succès')
                }
            });
        }
    });

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