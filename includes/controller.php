<?php

if(isset($_GET['delete'])){
    if (isset($_SESSION['id']) && $_SESSION['role'] == 'restaurateur') {
        $response = db_delete($_GET['delete'], $_GET['delete_id']);
    }
}

if(isset($_GET['id_plat'])){
    $plat = db_get('plats', $_GET['id_plat'])[0];

    $note = db_query("SELECT * FROM notes WHERE id_client = " . $_GET['id_client'] . " AND id_plat = " . $_GET['id_plat']);
    if(count($note) > 0){
        // déjà noté
    }
    else{
        $note = [
            'id_plat' => $_GET['id_plat'],
            'id_client' => $_GET['id_client'],
            'note' => $_GET['note']
        ];
        db_insert('notes', $note);

        $plat['nb_votes'] += 1;
        $plat['cumul_notes'] += $_GET['note'];
        db_update('plats', $_GET['id_plat'], $plat);
    }
}
if(isset($_GET['creerresto'])){
    $nouveau_restaurant = [
        'id_restaurateur' => $_SESSION['id']
    ];
    $insert = db_insert('restaurants', $nouveau_restaurant);
    if($insert['success'] == true){
        header('Location: index.php?page=profil-restaurant');
    }
}

if(isset($_POST['_form'])){
    switch($_POST['_form']){
        case 'formEditRestaurant':
            $update = db_update('restaurants', $_POST['_id'], $_POST);
            break;
        case 'formAjoutPlat':
            $insert = db_insert('plats', $_POST);
            break;
        default:
            $response['erreur'] = 'formulaire non identifié.';
            break;
    }
}

$mail = envoiEmail('cedric.hoizey@gmail.com','cedric.hoizey@gmail.com', 'test 1', 'yeah');
//var_dump($mail);
// Routage
$requested_page = isset($_GET['page']) ? $_GET['page'] : null;
switch($requested_page){
    case 'inscription':
        $page = 'inscription';
        $pagetitle = "Inscription";
        break;
    case 'choix-compte':
        $page = 'choix-compte';
        $pagetitle = "Qui êtes-vous ?";
        break;
    case 'profil':
        $page = 'profil';
        $pagetitle = "Votre compte";
        if($userinfo['role'] == 'restaurateur') {
            $restaurant = db_get('restaurants', $_SESSION['id'], 'id_restaurateur');
            if (count($restaurant) > 0) {
                $restaurant = $restaurant[0];
            }
            else {
                $restaurant = null;
            }
        }
        else {
            $commandes = db_get('commandes', $_SESSION['id'], 'id_client', 'get_commande_details');
        }
        break;
    case 'profil-edit':
        $page = 'profil-edit';
        $pagetitle = 'Edition du Profil';
        break;
    case 'profil-restaurant':
        $page = 'profil-restaurant';
        $restaurant = db_get('restaurants', $_SESSION['id'], 'id_restaurateur')[0];
        $plats = db_get('plats', $restaurant['id'], 'id_restaurant', 'calcul_moyenne');

        $commandes = db_query("SELECT * FROM commandes WHERE id_restaurant = " . $restaurant['id'], 'get_commande_details');
        $pagetitle = "Votre compte";
        break;
    case 'connexion':
        $page = 'connexion';
        $pagetitle = "Connexion";
        break;
    case 'restaurants':
        $page = 'restaurants';
        $restaurants = db_get('restaurants');
        $pagetitle = "Liste des restaurants";
        break;
    case 'restaurant':
        $page = 'restaurant';
        $restaurant = db_get('restaurants', $_GET['restaurant_id'])[0];
        $plats = db_get('plats', $_GET['restaurant_id'], 'id_restaurant', 'calcul_moyenne');
        $pagetitle = "" . $restaurant['nom'] . " commande";
        break;
    case 'plats':
        $page = 'plats';
        $plats = db_get('plats');
        break;
    case 'finalisation-commande':
        $page = 'finalisation-commande';
        break;

    case 'merci':
        $page = 'merci';
        $pagetitle = "Merci pour votre commande.";
        $commande = db_get('commandes', $_GET['commande'])[0];
        $plats = json_decode($commande['plats']);
        break;
    default:
        $page = 'homepage';
        $restaurants = db_get('restaurants');
        break;
}
//A FINIR (pb d'index toujours)