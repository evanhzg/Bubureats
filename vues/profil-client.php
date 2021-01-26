CLIENT
        <div>
            <h1>Profil de <?php echo $userinfo['prenom'];?> </h1>
        </div>
        <section>
            <form class="contact-form">
                <div class="form-group">
                <label class="label">Nom</label>
                    <input class="form-control" type="text" placeholder="<?php echo $userinfo['nom']?>" disabled>
                </div>
                <div class="form-group">
                <label class="label">prenom</label>
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
                <label class="label">Solde</label>
                    <input class="form-control" type="text" placeholder="<?php echo $userinfo['solde']?>" disabled>
                </div>
                <div>
                    <a class="btn btn-primary edit" href="index.php?page=profil-edit">Editer mon profil</a>
                </div>
        </section>
    <?php
    if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
    {
    ?>
    <?php
    }
    ?>