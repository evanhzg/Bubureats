<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
if(isset($_POST['forminscription']))
{
    if(!empty($_POST['nom']) AND !empty($_POST['Prénom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prénom = htmlspecialchars($_POST['Prénom']);
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $mdp = sha1($_POST['mdp']);
        $mdp2 = sha1($_POST['mdp2']);

        if($mail == $mail2)
        {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
                $reqnom = $bdd->prepare("SELECT * FROM membres WHERE nom = ?");
                $reqnom->execute(array($nom));
                $nomexist = $reqnom->rowCount();
                if($nomexist == 0)
                {
                    $reqprenom = $bdd->prepare("SELECT * FROM membres WHERE prénom = ?");
                    $reqprenom->execute(array($prénom));
                    $prenomexist = $reqprenom->rowCount();
                    if($prenomexist == 0)
                    {
                        $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                        $reqmail->execute(array($mail));
                        $mailexist = $reqmail->rowCount();
                        if($mailexist == 0)
                        {

                            if($mdp == $mdp2)
                            {
                                $insertmbr = $bdd->prepare("INSERT INTO membres(nom, prénom, mail, motdepasse) VALUES(?, ?, ?, ?)");
                                $insertmbr->execute(array($nom, $prénom, $mail, $mdp));
                                header("Location: connexion_client.php");
                            }
                            else
                            {
                                $erreur = "Vos mots ne passe de correspondent pas!";
                            }
                        }
                        else
                        {
                            $erreur = "Adresse mail déja utilisée!";
                        }
                    }
                    else
                    {
                        $erreur = "Prénom déja utilisé!";
                    }
                }
                else
                {
                    $erreur = "Nom déja utilisé!";
                }
            }
            else
            {
                $erreur = "Votre adresse mail n'est pas valide!";
            }
        }
        else
        {
            $erreur = "Vos mails ne correspondent pas!";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être complétés!";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inscription_client.css">
    <title>Bubur eats/Inscription Client</title>
</head>
<body>
    <div class = co>
        <h1>Inscription Client</h1>
        Vous n'êtes pas client? Revenez à l'espace identification ici
        <br><br>
        <a href="../php/identification.php">Identification</a>
    </div>
    <br><br>
    <section>
        <form method="POST" action="" class="contact-form">
            <div>
                <label for="nom" class="label">NOM</label>
                <input type="text" placeholder="Votre nom" id="nom" name="nom">
            </div>
            <div>
                <label for="Prénom" class="label">PRENOM</label>
                <input type="text" placeholder="Votre prénom" id="Prénom" name="Prénom">
            </div>
            <div>
                <label for="mail" class="label">MAIL</label>
                <input type="email" placeholder="Votre mail" id="mail" name="mail">
            </div>
            <div>
                <label for="mail2" class="label"> CONFIRMATION DU MAIL</label>
                <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2">
            </div>
            <div>
                <label for="mdp" class="label">MOT DE PASSE</label>
                <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp">
            </div>
            <div>
                <label for="mdp2" class="label">CONFIRMATION DU MOT DE PASSE</label>
                <input type="password" placeholder="Confirmer votre mot de passe" id="mdp2" name="mdp2">
            </div>
            <br>
            <div>
            <input type="submit" name="forminscription" value="Je m'inscris">
            </div>
        </form>
    </section>
    <br>
    <?php
    if(isset($erreur))
    {
        echo '<div class="erreur">' .$erreur. '</div>';
    }
    ?>
    <br><br>
    <div class = co>
    Vous avez déja un compte? Connectez vous ici
    <br><br>
    <a href="../php/connexion_client.php">Se connecter</a>
    </div>
</body>
</html>