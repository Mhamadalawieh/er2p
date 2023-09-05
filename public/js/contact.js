$( document ).ready(function() {

    $('#submit').on('click', function(){
        let url = '/nous-contacter/post';
        let page = $(this).data('page');
        if($('#name').val() && $('#phone').val() && $('#message').val()) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    name: $('#name').val(),
                    phone: $('#phone').val(),
                    message: $('#message').val(),
                },
                success: function () {
                    popsuccess('Votre message a été transmis à nos équipes, merci');
                },
            });
        } else {
            poperror('Merci de remplir tous les champs pour envoyer un message');
        }
    })


});