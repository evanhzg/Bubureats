<?php

function get_restaurateur($plat){
    $restaurant = db_get('restaurants', $plat['id_restaurant'])[0];
    $plat['id_restaurateur'] = $restaurant['id_restaurateur'];
    return $plat;
}