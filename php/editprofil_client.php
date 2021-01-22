<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
if(isset($_SESSION['id']))
{
    $requser = $bdd->prepare ("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom'])
    {
        $newnom = htmlspecialchars($_POST['newnom']);
        $insertnom = $bdd->prepare("UPDATE membres SET nom = ? WHERE id = ?");
        $insertnom->execute(array($newnom, $_SESSION['id']));
        header("location: profil_client.php?id=".$_SESSION['id']);
    }
    if(isset($_POST['newprénom']) AND !empty($_POST['newprénom']) AND $_POST['newprénom'] != $user['prénom'])
    {
        $newprénom = htmlspecialchars($_POST['newprénom']);
        $insertprénom = $bdd->prepare("UPDATE membres SET prénom = ? WHERE id = ?");
        $insertprénom->execute(array($newprénom, $_SESSION['id']));
        header("location: profil_client.php?id=".$_SESSION['id']);
    }
    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail'])
    {
        $newmail = htmlspecialchars($_POST['newmail']);
        $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
        $insertmail->execute(array($newmail, $_SESSION['id']));
        header("location: profil_client.php?id=".$_SESSION['id']);

    }
    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND ($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
    {
        $mdp1 = sha1($_POST['newmdp1']);
        $mdp2 = sha1($_POST['newmdp2']); 
        if($mdp1 == $mdp2)
        {
            $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
            $insertmdp->execute(array($mdp1, $_SESSION['id']));
            header("location: profil_client.php?id=".$_SESSION['id']);
        }
        else
        {
            $erreur = "Vos mots de passe ne correspondent pas!";
        }
    }
    if(isset($_POST['new_adresse']) AND !empty($_POST['new_adresse']) AND $_POST['new_adresse'] != $user['adresse'])
    {
        $new_adresse = htmlspecialchars($_POST['new_adresse']);
        $insertadresse = $bdd->prepare("UPDATE membres SET adresse = ? WHERE id = ?");
        $insertadresse->execute(array($new_adresse, $_SESSION['id']));
        header("location: profil_client.php?id=".$_SESSION['id']);

    }
    if(isset($_POST['new_solde']) AND !empty($_POST['new_solde']) AND $_POST['new_solde'] != $user['solde'])
    {
        $new_solde = htmlspecialchars($_POST['new_solde']);
        $insertsolde = $bdd->prepare("UPDATE membres SET solde = ? WHERE id = ?");
        $insertsolde->execute(array($new_solde, $_SESSION['id']));
        header("location: profil_client.php?id=".$_SESSION['id']);

    }
    if(isset($_POST['newprénom']) AND $_POST['newprénom'] == $user['prénom'])
    {
        header("location: profil_client.php?id=".$_SESSION['id']);
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/editprofil_client.css">
    <title>Bubur eats/Edition du profil</title>
</head>
<body>
        <div>
            <h1>Edition de mon profil</h1>
        </div>
        <br><br><br>
        <section>
            <form method="POST" class="contact-form">
                <div>
                <label class="label">Nom</label>
                <input type="text" placeholder="nom" name="newnom" value="<?php echo $user['nom']; ?>">
                </div>
                <div>
                <label class="label">Prénom</label>
                <input type="text" placeholder="prénom" name="newprénom" value="<?php echo $user['prénom']; ?>">
                </div>
                <div>
                <label class="label">Mail</label>
                <input type="text" placeholder="mail" name="newmail" value="<?php echo $user['mail']; ?>">
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
                <input type="text" placeholder="adresse" name="new_adresse" value="<?php echo $user['adresse']; ?>">
                </div>
                <div>
                <label class="label">Solde</label>
                <input type="text" placeholder="solde" name="new_solde" value="<?php echo $user['solde']; ?>">
                </div>
                <div>
                <input type="submit" value="Mettre à jour mon profil">
                </div>
        </section>
        <br><br>
        <?php
        if(isset($erreur))
        {
            echo '<div class="erreur">' .$erreur. '</div>';
        }
        ?>
</body>
</html>
<?php
}
else
{
    header("location: connexion_client.php");
}
?>