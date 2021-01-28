



<div class="container mt-4">
    <div>
        <h1 class="text-center">Profil de <?php echo $userinfo['prenom'];?> </h1>
    </div>
    <section class="row">
        <div class="col-md-6">
            <h2 class="text-center">Votre restaurant</h2>
            <?php echo parse('form-edit-restaurant.html', $restaurant);?>
        </div>

        <div class="col-md-6">
            <h2 class="text-center">Vos commandes en cours</h2>
            <?php
                foreach($commandes as $commande){
                    echo parse('commandes-cards-profil.html', $commande);
                }
            ?>
        </div>
    </section>
</div>