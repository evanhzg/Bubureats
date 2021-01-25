<?php
$restaurant = db_get('restaurants', $membre['id'], 'id_restaurateur')[0];
$plats = db_get('plats', $restaurant['id'], 'id_restaurant', 'get_restaurateur');
?>

<div><?php echo parse('restaurant-header.html', $restaurant);?></div>
<div class="row liste-plats">
    <?php
    foreach($plats as $plat){
        $plat['id_restaurant'] = $restaurant['id'];
        echo parse('plats-small-line.html', $plat);
    }
    ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nouveauplat"><i class="fas fa-plus"></i> Ajouter un plat</button>
</div>