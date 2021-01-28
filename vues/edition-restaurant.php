



<div class="container-full p-4 mt-4">
    <div>
        <h1 class="text-center">Profil de <?php echo $userinfo['prenom'];?> </h1>
    </div>
    <section class="row">
        <div class="col-md-4">
            <h2 class="text-center">Votre restaurant</h2>
            <?php echo parse('form-edit-restaurant.html', $restaurant);?>
        </div>

        <div class="col-md-4">
            <h2 class="text-center">Vos plats</h2>
            <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#nouveauplat"><i class="fas fa-plus"></i> Ajouter un plat</button>

            <?php
            foreach($plats as $plat){
                $plat['id_restaurant'] = $restaurant['id'];
                echo parse('plats-small-profil.html', $plat);
            }
            ?>
        </div>

        <div class="col-md-4">
            <h2 class="text-center">Vos commandes en cours</h2>
            <?php
                foreach($commandes as $commande){
                    echo parse('commandes-cards-profil.html', $commande);
                }
            ?>
        </div>
    </section>
</div>