<section>
    <form method="POST" class="contact-form">
        <div>
            <label class="label">Nom</label>
            <input type="text" placeholder="nom" name="newnom" value="<?php echo $userinfo['nom']; ?>">
        </div>
        <div>
            <label class="label">Prénom</label>
            <input type="text" placeholder="prenom" name="newprenom" value="<?php echo $userinfo['prenom']; ?>">
        </div>
        <div>
            <label class="label">Mail</label>
            <input type="text" placeholder="mail" name="newmail" value="<?php echo $userinfo['mail']; ?>">
        </div>
        <div>
            <label class="label">Mot de passe</label>
            <input type="password" placeholder="mot de passe" name="newmdp1" >
        </div>
        <div>
            <label class="label">Confirmation du mot de passe</label>
            <input type="password" placeholder="mot de passe" name="newmdp2" >
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="adresse">Adresse</label>
                <input class="form-control" type="text" placeholder="Votre adresse" id="adresse" name="adresse">
            </div>
            <div class="form-group col-md-4">
                <label for="ville">Ville</label>
                <input class="form-control" type="text" placeholder="Ville" id="ville" name="ville">
            </div>
            <div class="form-group col-md-2">
                <label for="codepostal">Code Postal</label>
                <input class="form-control" type="text" placeholder="CP" id="codepostal" name="codepostal">
            </div>
            </div>
        <div>
            <label class="label">Solde</label>
            <input type="number" step="0.01" placeholder="solde" name="new_solde" value="<?php echo $userinfo['solde']; ?>">
        </div>
        <div>
            <input type="submit" name="formEditProfile" value="Mettre à jour mon profil">
        </div>

        <?php
        if(isset($update_profile) && $update_profile['success'] == false){
            echo parse('alerte-erreur.html', $update_profile);
        }
        ?>
</section>