<?php
function auth_login($data){
    global $bdd;
    $response = ['success'  => false];
    $mailconnect = htmlspecialchars($data['mailconnect']);
    $mdpconnect = sha1($data['mdpconnect']);
    if(!empty($mailconnect) AND !empty($mdpconnect))
    {
        $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse= ?");
        $requser->execute (array($mailconnect, $mdpconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            $_SESSION['mail'] = $userinfo['mail'];
            $response['success'] = true;
            if($_SESSION['role'] != 'admin'){
                header("Location: index.php?page=profil");
            }
            else{
                header("Location: " . ADMIN_URL);
            }
        }
        else
        {
            $response['erreur'] = "Mail ou mot de passe invalide!";
        }
    }
    else
    {
        $response['erreur'] = "Tous les champs doivent être remplis!";
    }
    return $response;
}

function auth_login_admin($data){
    global $bdd;
    $response = ['success' => false];
    
    if($data['email'] != '' && $data['password'] != ''){
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $response['erreur'] = "Adresse email invalide!";
            return $response;
        }
    }
    else{
        $response['erreur'] = "Tous les champs doivent être complétés !";
        return $response;
    }
    
    //login
    $mailconnect = htmlspecialchars($data['email']);
    $mdpconnect = sha1($data['password']);

    $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse= ? AND role = 'admin'");
    $requser->execute (array($mailconnect, $mdpconnect));
    $userexist = $requser->rowCount();
    $userinfo = $requser->fetch();
    if($userexist == 1) {
        $_SESSION['admin'] = $userinfo;
        $response['success'] = true;
        header("Location: " . ADMIN_URL);
        return $response;
    }
    else {
        $response['erreur'] = "Vous n'avez pas accès à cet espace.";
    }

    //verif si role=admin
    //si oui, dashboard
    //si non, deconnexion et alerte 'non admin'

    unset($_SESSION['admin']);
    $response['erreur'] = "Erreur inconnue";
    return $response;
}

function auth_getUser($id){
    $user = db_get('membres', $id)[0];
    return $user;
}

function auth_logout(){
    $_SESSION = array();
    session_destroy();
    header("location: index.php?page=choix-compte");
}

function auth_update_profile(){
    global $bdd;
    $response = ['success'  => false];
    $requser = $bdd->prepare ("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom'])
    {
        $newnom = htmlspecialchars($_POST['newnom']);
        $insertnom = $bdd->prepare("UPDATE membres SET nom = ? WHERE id = ?");
        $insertnom->execute(array($newnom, $_SESSION['id']));
        header("location: index.php?page=profil");
    }
    if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom'])
    {
        $newprenom = htmlspecialchars($_POST['newprenom']);
        $insertprenom = $bdd->prepare("UPDATE membres SET prenom = ? WHERE id = ?");
        $insertprenom->execute(array($newprenom, $_SESSION['id']));
        header("location: index.php?page=profil");
    }
    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail'])
    {
        $newmail = htmlspecialchars($_POST['newmail']);
        $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
        $insertmail->execute(array($newmail, $_SESSION['id']));
        header("location: index.php?page=profil");

    }
    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND ($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
    {
        $mdp1 = sha1($_POST['newmdp1']);
        $mdp2 = sha1($_POST['newmdp2']); 
        if($mdp1 == $mdp2)
        {
            $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
            $insertmdp->execute(array($mdp1, $_SESSION['id']));
            header("location: index.php?page=profil");
        }
        else
        {
            $response['erreur'] = "Vos mots de passe ne correspondent pas!";
        }
    }
    if(isset($_POST['ville']) AND isset($_POST['codepostal']) AND isset($_POST['adresse']) AND !empty($_POST['adresse']))
    {
        $new_adresse = htmlspecialchars($_POST['adresse']) . ", " . htmlspecialchars($_POST['codepostal']) . " " . htmlspecialchars($_POST['ville']);
        $insertadresse = $bdd->prepare("UPDATE membres SET adresse = ? WHERE id = ?");
        $insertadresse->execute(array($new_adresse, $_SESSION['id']));
        header("location: index.php?page=profil");

    }
    if(isset($_POST['new_solde']) AND !empty($_POST['new_solde']) AND $_POST['new_solde'] != $user['solde'])
    {
        $new_solde = htmlspecialchars($_POST['new_solde']);
        $insertsolde = $bdd->prepare("UPDATE membres SET solde = ? WHERE id = ?");
        $insertsolde->execute(array($new_solde, $_SESSION['id']));
        header("location: index.php?page=profil");

    }
    if(isset($_POST['newprenom']) AND $_POST['newprenom'] == $user['prenom'])
    {
        header("location: index.php?page=profil");
    }
    $response['erreur'] = "Merci de vérifier tous les champs.";
    return $response;
}

function auth_create_profile(){
    global $bdd;
    $response = ['success'  => false];
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $mdp = sha1($_POST['mdp']);
        $mdp2 = sha1($_POST['mdp2']);
        $role = $_POST['role'];
        $adresse = htmlspecialchars($_POST['adresse']) . ", " . htmlspecialchars($_POST['codepostal']) . " " . htmlspecialchars($_POST['ville']);
        if($mail == $mail2)
        {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
                $reqnom = $bdd->prepare("SELECT * FROM membres WHERE nom = ?");
                $reqnom->execute(array($nom));
                $nomexist = $reqnom->rowCount();
                if($nomexist == 0)
                {
                    $reqprenom = $bdd->prepare("SELECT * FROM membres WHERE prenom = ?");
                    $reqprenom->execute(array($prenom));
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
                                $insertmbr = $bdd->prepare("INSERT INTO membres(nom, prenom, mail, motdepasse, adresse, `role`) VALUES(?, ?, ?, ?, ?, ?)");
                                $insertmbr->execute(array($nom, $prenom, $mail, $mdp, $adresse, $role));
                                $log = auth_login(['mailconnect' => $mail, 'mdpconnect' => $_POST['mdp'], 'role' => $role]);
                            }
                            else
                            {
                                $response['erreur'] = "Vos mots ne passe de correspondent pas!";
                            }
                        }
                        else
                        {
                            $response['erreur'] = "Adresse mail déja utilisée!";
                        }
                    }
                    else
                    {
                        $response['erreur'] = "prenom déja utilisé!";
                    }
                }
                else
                {
                    $response['erreur'] = "Nom déja utilisé!";
                }
            }
            else
            {
                $response['erreur'] = "Votre adresse mail n'est pas valide!";
            }
        }
        else
        {
            $response['erreur'] = "Vos mails ne correspondent pas!";
        }
    }
    else
    {
        $response['erreur'] = "Tous les champs doivent être complétés!";
    }

    return $response;
}