<?php
if(isset($create_profile) && $create_profile['success'] == false)
{
    echo parse_alert('Les informations fournies sont incorrectes. Réessayez.', 'danger');
}
?>

<div class="container">
    <div class = co>
        <h1 class="text-uppercase my-4 text-center">Inscription <?php echo $_GET['role']?></h1>
    </div>
    <section class="mb-4">
        <form method="POST" class="contact-form">
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
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="adresse">Adresse</label>
                    <input class="form-control" type="text" placeholder="Votre adresse" id="adresse" name="adresse" value="adresse">
                </div>
                <div class="form-group col-md-4">
                    <label for="ville">Ville</label>
                    <input class="form-control" type="text" placeholder="Ville" id="ville" name="ville" value="ville">
                </div>
                <div class="form-group col-md-2">
                    <label for="codepostal">Code Postal</label>
                    <input class="form-control" type="text" placeholder="CP" id="codepostal" name="codepostal" value="codepostal">
                </div>
            </div>
                <input type="hidden" name="role" value="<?php echo $_GET['role'];?>">
            <div>
                <input class="btn btn-primary" type="submit" name="forminscription" value="Je m'inscris">
            </div>
        </form>
    </section>
    <p>Vous avez déjà un compte? Rejoignez l'espace d'identification ici: <a class="btn btn-secondary" href="index.php?page=connexion">Connexion</a></p>
</div>