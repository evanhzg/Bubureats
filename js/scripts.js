$(document).ready( function () {
    // fonctions des tableaux
    $('.dataTable').DataTable();

    // confirmation d'action
    $('.confirm').on('click', function(event){
        if(!confirm('Confirmer la suppression ?')){
            event.preventDefault();
            return false;
        }
    });
    
} );