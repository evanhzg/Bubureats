<?php
if(isset($_POST['_form'])){
    switch($_POST['_form']){
        case 'formAjoutMembre':
            $insert = db_insert('membres', $_POST);
            break;
        case 'formAjoutPlat':
            $insert = db_insert('plats', $_POST);
            break;
        case 'formEditMembre':
            $update = db_update('membres', $_POST['_id'], $_POST);
            break;
        default:
            $response['erreur'] = 'formulaire non identifié.';
            break;
    }
}

if(isset($_GET['delete'])){
    $response = db_delete($_GET['delete'], $_GET['delete_id']);
}