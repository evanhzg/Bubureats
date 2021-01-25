<?php
if(isset($login) && $login['success'] == false)
{
    echo parse_alert("Les informations de connexion sont erronées. Veuillez réessayer.", 'danger');
}
?>

<div class="container">
    <div>
    <h1 class="text-uppercase my-4 text-center">Connexion</h1>
    </div>
    <section class="mb-4">
        <form method="POST" class="contact-form">
            <div class="form-group">
                <label for="mail" class="label">Mail</label>
                <input class="form-control" type="email" placeholder="Votre mail" id="mailconnect" name="mailconnect">
            </div>
            <div class="form-group">
                <label for="mail" class="label">Mot de passe</label>
                <input class="form-control" type="password" placeholder="Votre mot de passe" id="mdpconnect" name="mdpconnect">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="formconnect" value="Se connecter">
            </div>
        </form>
    </section>
    <p>Vous n'avez pas de compte? Rejoignez l'espace d'inscription ici: <a class="btn btn-secondary" href="index.php?page=choix-compte">Inscription</a></p>

</div>