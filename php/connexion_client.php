<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
if(isset($_POST['formconnect']))
{
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if(!empty($mailconnect) AND !empty($mdpconnect))
    {
        $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse= ?");
        $requser->execute (array($mailconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['prénom'] = $userinfo['prénom'];
            $_SESSION['mail'] = $userinfo['mail'];
            header("Location: profil_client.php?id=".$_SESSION['id']);
        }
        else
        {
            $erreur = "Mail ou mot de passe invalide!";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être remplis!";
    }
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
    if(isset($erreur))
    {
        echo '<div class="erreur">' .$erreur. '</div>';
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