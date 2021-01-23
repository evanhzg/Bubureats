<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php
            echo parse('restaurant-header.html', $restaurant);
            ?>
            <h2>Nos plats</h2>
            <div class="row liste-plats">
                <?php
                foreach($plats as $plat){
                    $plat['id_restaurant'] = $restaurant['id'];
                    echo parse('plats-small.html', $plat);
                }
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        Votre commande
                    </h3>
                    <div>
                        <?php
                        foreach($panier->plats as $plat) {
                            echo parse('plat-panier.html', $plat);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>