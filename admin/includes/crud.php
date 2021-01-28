<?php
if (isset($_FILES['photo'])) {
    //upload();
}
if(isset($_POST['_form'])){
    switch($_POST['_form']){
        case 'formAjoutMembre':
            $insert = db_insert('membres', $_POST);
            break;
        case 'formAjoutPlat':
            $insert = db_insert('plats', $_POST);
            break;
        case 'formEditPlat':
            $update = db_update('plats', $_POST['_id'], $_POST);
            break;
        case 'formAjoutRestaurant':
            $insert = db_insert('restaurants', $_POST);
            break;
        case 'formEditMembre':
            $update = db_update('membres', $_POST['_id'], $_POST);
            break;
        case 'formEditRestaurant':
            $update = db_update('restaurants', $_POST['_id'], $_POST);
            break;
        case 'formEditStatut':
            $update = db_update('commandes', $_POST['_id'], $_POST);
            break;
        case 'formEditLivraison':
            $temps['temps_livraison'] = ($_POST['temps_heures']*60) + $_POST['temps_minutes'];
            $update = db_update('configuration', 1, $temps);
            header("Refresh:0");
            break;
        case 'formEditCommission':
            $commission['montant_commission'] = $_POST['montant_commission'];
            $update = db_update('configuration', 1, $commission);
            header("Refresh:0");
            break;
        default:
            $response['erreur'] = 'formulaire non identifié.';
            break;
    }
}

if(isset($_GET['delete'])){
    $response = db_delete($_GET['delete'], $_GET['delete_id']);
}