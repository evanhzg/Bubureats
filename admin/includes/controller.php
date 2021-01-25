<?php
session_start();
define('WEBSITE_URL', 'http://localhost/bubureats');
define('ADMIN_URL', 'http://localhost/bubureats/admin/');
define('ROOT', realpath(dirname(dirname(__DIR__))));
define('ADMIN_ROOT', ROOT . '/admin');

include ROOT . '/includes/connexion.db.php';
include ROOT . '/includes/functions.php';
include ADMIN_ROOT . '/includes/callbacks.php';
include ADMIN_ROOT . '/includes/controller.auth.php';
include ADMIN_ROOT . '/includes/crud.php';

// Routage
$requested_page = isset($_GET['page']) ? $_GET['page'] : null;
switch($requested_page){
    case 'membres':
        $page = 'membres';
        $pagetitle = "membres";
        $membres = db_get('membres');
        $columns = array_keys($membres[0]);
        break;
    case 'membre-edit':
        $page = 'membre-edit';
        $pagetitle = "membres";
        $membre = db_get('membres', $_GET['id'])[0];
        $membre['is_client'] = $membre['role'] == 'client' ? ' checked' : null;
        $membre['is_restaurateur'] = $membre['role'] == 'restaurateur' ? ' checked' : null;
        $membre['is_admin'] = $membre['role'] == 'admin' ? ' checked' : null;
        break;
    default:
        $page = 'dashboard';
        $restaurants = db_get('restaurants');
        $membres = db_get('membres');
        $commandes = db_get('commandes');
        $total_commissions = get_commissions('commandes');
        $stats = [
            'nb_restaurants' => count($restaurants),
            'nb_membres' => count($membres),
            'nb_commandes' => count($commandes),
            'total_commissions' => $total_commissions . "€"
        ];
        break;
}