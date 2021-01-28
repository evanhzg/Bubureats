<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div>
                <h1 class="text-center">Profil de <?php echo $userinfo['prenom'];?> </h1>
            </div>
            <section class="mb-4 mx-4 text-uppercase">
                <form class="contact-form">
                    <div class="form-group">
                        <label class="label">Nom</label>
                        <input class="form-control" type="text" placeholder="<?php echo $userinfo['nom']?>" disabled>
                    </div>
                    <div class="form-group">
                        <label class="label">Prenom</label>
                        <input class="form-control" type="text" placeholder="<?php echo $userinfo['prenom']?>" disabled>
                    </div>
                    <div class="form-group">
                        <label class="label">Mail</label>
                        <input class="form-control" type="text" placeholder="<?php echo $userinfo['mail']?>" disabled>
                    </div>
                    <div class="form-group">
                        <label class="label">Adresse</label>
                        <input class="form-control" type="text" placeholder="<?php echo $userinfo['adresse']?>" disabled>
                    </div>
                    <div class="form-group">
                        <label class="label">Revenus</label>
                        <input class="form-control" type="text" placeholder="<?php echo $userinfo['solde']?>" disabled>
                    </div>
                    <div>
                        <a class="btn btn-primary edit" href="index.php?page=profil-edit">Editer mon profil</a>
                    </div>
            </section>
        </div>

        <div class="col-md-6">
            <?php
            if(is_null($restaurant)){
                echo '<p>pas de resto</p>';
                echo '<p><a class="btn btn-success btn-lg" href="index.php?page=profil&creerresto">Créer votre restaurant</a></p>';
            }
            else{
                echo parse('restaurant-small-profil.html', $restaurant);
            }
            ?>
        </div>
    </div>
</div>