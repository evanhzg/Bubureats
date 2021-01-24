<?php
if(isset($_POST['_form'])){
    switch($_POST['_form']){
        case 'formAjoutMembre':
            $response = db_insert('membres', $_POST);
            var_dump($response);
            break;

        default:
            $response['erreur'] = 'formulaire non identifié.';
            break;
    }
}
?>