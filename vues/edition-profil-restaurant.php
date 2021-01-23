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
        <div>
            <label class="label">Adresse </label>
            <input type="text" placeholder="adresse" name="new_adresse" value="<?php echo $userinfo['adresse']; ?>">
        </div>
        <div>
            <label class="label">Solde</label>
            <input type="text" placeholder="solde" name="new_solde" value="<?php echo $userinfo['solde']; ?>">
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