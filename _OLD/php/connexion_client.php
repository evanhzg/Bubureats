<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=bubureats', 'root', '');
if(isset($_POST['formconnect']))
{
    $login = auth_login($_POST);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/connexion_client.css">
    <title>Bubur eats/Connexion Client</title>
</head>
<body>
    <div>
        <h2>Connexion Client</h2>
    </div>
    <br><br><br>
    <section>
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
    </section>
    <br><br>
    <?php
    if($login['success'] == false)
    {
        echo '<div class="alert alert-danger">' .$login['erreur']. '</div>';
    }
    ?>
    <br><br>
    <div class="in">
    Vous n'avez pas de compte? Inscrivez vous ici
    <br><br>
    <a href="../php/inscription_client.php">S'inscrire</a>
    </div>
</body>
</html>