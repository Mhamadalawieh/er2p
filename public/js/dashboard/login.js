$( document ).ready(function() {
    let error = getUrlParameter('error');
    if(error == 'id'){
        dberror('Identifiant incorrect')
    } else if(error == 'password'){
        dberror('Mot de passe incorrect')
    }

});