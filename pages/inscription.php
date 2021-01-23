<div class="container">
    <div class = co>
        <h1>Inscription Client</h1>
        Vous n'êtes pas client? Revenez à l'espace identification ici
        <br><br>
        <a href="index.php?page=choix-compte">Identification</a>
    </div>
    <br><br>
    <section>
        <form method="POST" action="" class="contact-form">
            <div class="form-group">
                <label for="nom" class="label">NOM</label>
                <input class="form-control" type="text" placeholder="Votre nom" id="nom" name="nom">
            </div>
            <div class="form-group">
                <label for="prenom" class="label">PRENOM</label>
                <input class="form-control" type="text" placeholder="Votre prenom" id="prenom" name="prenom">
            </div>
            <div class="form-group">
                <label for="mail" class="label">MAIL</label>
                <input class="form-control" type="email" placeholder="Votre mail" id="mail" name="mail">
            </div>
            <div class="form-group">
                <label for="mail2" class="label">CONFIRMATION DU MAIL</label>
                <input class="form-control" type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2">
            </div>
            <div class="form-group">
                <label for="mdp" class="label">MOT DE PASSE</label>
                <input class="form-control" type="password" placeholder="Votre mot de passe" id="mdp" name="mdp">
            </div>
            <div class="form-group">
                <label for="mdp2" class="label">CONFIRMATION DU MOT DE PASSE</label>
                <input class="form-control" type="password" placeholder="Confirmer votre mot de passe" id="mdp2" name="mdp2">
            </div>

            <input type="hidden" name="role" value="<?php echo $_GET['role'];?>">
            <div>
            <input class="btn btn-primary" type="submit" name="forminscription" value="Je m'inscris">
            </div>
        </form>
    </section>
    <br>
    <?php
    if(isset($create_profile) && $create_profile['success'] == false)
    {
        echo parse('alerte-erreur.html', $create_profile);
    }
    ?>
    <br><br>
    <div class = co>
        Vous avez déja un compte? Connectez vous ici
        <br><br>
        <a href="index.php?page=connexion">Se connecter</a>
    </div>
</div>