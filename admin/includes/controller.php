<?php
session_start();

// Routage
$requested_page = isset($_GET['page']) ? $_GET['page'] : null;
switch($requested_page){
    case 'membres':
        $page = 'membres';
        $pagetitle = "membres";
        $membres = db_get('membres');
        $columns = array_keys($membres[0]);
        break;

    case 'restaurants':
        $page = 'restaurants';
        $pagetitle = "restaurants";
        $restaurants = db_get('restaurants');
        $restaurateurs = db_get('membres', 'restaurateur', 'role');
        $columns = array_keys($restaurants[0]);
        break;

    case 'configuration':
        $page = 'configuration';
        $pagetitle = "Configuration";
        break;

    case 'membre-edit':
        $page = 'membre-edit';
        $pagetitle = "membres";
        $membre = db_get('membres', $_GET['id'])[0];
        $membre['is_client'] = $membre['role'] == 'client' ? ' checked' : null;
        $membre['is_restaurateur'] = $membre['role'] == 'restaurateur' ? ' checked' : null;
        $membre['is_admin'] = $membre['role'] == 'admin' ? ' checked' : null;
        break;

    case 'restaurant-edit':
        $page = 'restaurant-edit';
        $pagetitle = "restaurants";
        $restaurant = db_get('restaurants', $_GET['id'])[0];
        break;

    default:
        $page = 'dashboard';
        $restaurants = db_get('restaurants');
        $membres = db_get('membres');
        $commandes = db_get('commandes');
        $avis = db_get('avis');
        $total_commissions = get_commissions('commandes');
        $stats = [
            'nb_restaurants' => count($restaurants),
            'nb_membres' => count($membres),
            'nb_commandes' => count($commandes),
            'nb_avis' => count($avis),
            'total_commissions' => $total_commissions . "€",
            'commandes_atraiter' => get_commandes('atraiter'),
            'commandes_enpreparation' => get_commandes('enpreparation'),
            'commandes_enlivraison' => get_commandes('enlivraison'),
            'commandes_terminees' => get_commandes('terminee'),
        ];
        break;
}