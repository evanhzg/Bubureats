<?php
require 'panier.class.php';
$panier = new Panier();

if(isset($_GET['ajout_panier'])){
    $ajoutPlat = $panier->ajoutPlat($_GET['ajout_panier'], $_GET['q'], $_GET['restaurant_id']);
}

if(isset($_GET['payer'])){
    $panier->finaliserPanier();
}

if(isset($_GET['viderpanier'])){
    $panier->viderPanier();
}

if(isset($_GET['retirerplat'])){
    $panier->retirerPlat($_GET['retirerplat']);
}
