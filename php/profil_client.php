<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profil_client.css">
    <title>Bubur eats/Profil</title>
</head>
<body>
        <div>
            <h1>Profil de <?php echo $userinfo['prénom'];?> </h1>
        </div>
        <br><br><br><br>
        <section>
            <form class="contact-form">
                <div>
                <label class="label">Nom</label>
                <input type="text" placeholder="<?php echo $userinfo['nom']?>" disabled>
                </div>
                <div>
                <label class="label">Prénom</label>
                <input type="text" placeholder="<?php echo $userinfo['prénom']?>" disabled>
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
        <br><br><br><br>
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
</body>
</html>
<?php
}
?>