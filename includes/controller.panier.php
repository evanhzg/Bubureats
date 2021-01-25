<?php
require 'panier.class.php';
$panier = new Panier();

if(isset($_GET['ajout_panier'])){
    $panier->ajoutPlat($_GET['ajout_panier'], $_GET['q'], $_GET['restaurant_id']);
}

if(isset($_GET['payer'])){
    $panier->finaliserPanier();
}