<div class="container">
    <div>
        <h2>Connexion</h2>
    </div>
    <section>
        <div class=row>

            <div class="col-md-6">

                <form method="POST" action="" class="contact-form">
                    <div>
                        <label class="label">MAIL</label>
                        <input type="email" placeholder="Votre mail" name="mailconnect">
                    </div>
                    <div>
                        <label class="label">MOT DE PASSE</label>
                        <input type="password" placeholder="Votre mot de passe"name="mdpconnect">
                    </div>
                    <br>
                    <div>
                    <input type="submit" name="formconnect" value="Se connecter">
                    </div>
                </form>
                <?php
                if(isset($login) && $login['success'] == false)
                {
                    echo parse('alerte-erreur.html', $login);
                }
                ?>
                <div class="in">
                Vous n'avez pas de compte? Inscrivez vous ici
                <a href="index.php?page=inscription">S'inscrire</a>
                </div>
            </div>

            <div class="col-md-6">
            </div>

        </div>
    </section>
</div>