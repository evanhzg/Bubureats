<?php

// Routage
$requested_page = isset($_GET['page']) ? $_GET['page'] : null;
switch($requested_page){
    case 'restaurants':
        $page = 'restaurants';
        $restaurants = db_get('restaurants');
        $pagetitle = "BUBUR Eats  - Liste des restaurants";
        break;
    case 'restaurant':
        $page = 'restaurant';
        $restaurant = db_get('restaurants', $_GET['restaurant_id']);
        $plats = db_get('plats', $_GET['restaurant_id'], 'id_restaurant');
        $pagetitle = "BUBUR Eats  - " . $restaurant . " commande";
        break;
    case 'plats':
        $page = 'plats';
        $plats = db_get('plats');
        break;
    default:
        $page = 'homepage';
        break;
}