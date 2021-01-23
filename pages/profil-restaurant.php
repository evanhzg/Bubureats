
        <div>
            <h1>Profil de <?php echo $userinfo['prenom'];?> </h1>
        </div>
        <section>
            <form class="contact-form">
                <div>
                <label class="label">Nom</label>
                <input type="text" placeholder="<?php echo $userinfo['nom']?>" disabled>
                </div>
                <div>
                <label class="label">Prenom</label>
                <input type="text" placeholder="<?php echo $userinfo['prenom']?>" disabled>
                </div>
                <div>
                <label class="label">Mail</label>
                <input type="text" placeholder="<?php echo $userinfo['mail']?>" disabled>
                </div>
                <div>
                <label class="label">Adresse</label>
                <input type="text" placeholder="<?php echo $userinfo['adresse']?>" disabled>
                </div>
                <div>
                <label class="label">Solde</label>
                <input type="text" placeholder="<?php echo $userinfo['solde']?>" disabled>
                </div>
        </section>
    <?php
    if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
    {
    ?>
    <div>
        <a class="edit" href="../php/editprofil_client.php">Editer mon profil</a>
        <br><br>
        <a class="deco" href="../php/deconnexion_client.php">Se déconnecter</a> 
    </div>
    <?php
    }
    ?>