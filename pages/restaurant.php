<?php
if($restaurant['id'] != $panier->id_restaurant)
{
    if(!is_null($panier->erreur)) {
        echo parse_alert("$panier->erreur", 'danger');
    }
    else if(!is_null($panier->id_restaurant)){
        echo parse_alert("Vous avez déjà une commande en cours dans un autre restaurant.", 'warning');
    }
}
else{
    $nom_restaurant = $restaurant['nom'];
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php
            echo parse('restaurant-header.html', $restaurant);
            ?>
            <section class="container text-center border px-auto my-2">
                <h2>Nos plats</h2>
                <div class="row liste-plats">
                    <?php
                    foreach($plats as $plat){
                        $plat['id_restaurant'] = $restaurant['id'];
                        echo parse('plats-small.html', $plat);
                    }
                    ?>
                </div>
            </section>
        </div>
        <div class="col-md-4 my-2" style="height: auto;">
            <div class="card" style="height: 100%;">
                <div class="card-body px-1">
                    <h3 class="card-title">
                        Votre commande (<?php echo $panier->nom_restaurant;?>)
                    </h3>
                    <div>
                        <?php
                        foreach($panier->plats as $plat) {
                            echo parse('plat-panier.html', $plat);
                        }
                        ?>
                        <a href="index.php?page=finalisation-commande" class="btn btn-lg btn-primary btn-block fi">Payer (<?php echo number_format($panier->totaux['montant'], 2);?>€)</a>
                        <div class="mt-4 text-center">
                        <a href="index.php?page=restaurant&restaurant_id=<?php echo $restaurant['id']; ?>&viderpanier">Vider le panier</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>