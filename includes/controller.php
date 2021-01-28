<?php
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
        $commandes = db_get('commandes', $_SESSION['id'], 'id_client', 'get_commande_details');
        break;
    case 'profil-edit':
        $page = 'profil-edit';
        $pagetitle = 'Edition du Profil';
        break;
    case 'profil-restaurant':
        $page = 'profil-restaurant';
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
        break;
    default:
        $page = 'homepage';
        $restaurants = db_get('restaurants');
        break;
}
//A FINIR (pb d'index toujours)