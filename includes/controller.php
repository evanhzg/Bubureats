<?php
include 'includes/controller.auth.php';
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
    case 'profil-client':
        $page = 'profil-client';
        $pagetitle = "Votre compte";
        break;
    case 'edition-profil-client':
        $page = 'edition-profil-client';
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
        $plats = db_get('plats', $_GET['restaurant_id'], 'id_restaurant');
        $pagetitle = "" . $restaurant['nom'] . " commande";
        break;
    case 'plats':
        $page = 'plats';
        $plats = db_get('plats');
        break;
    default:
        $page = 'homepage';
        break;
}