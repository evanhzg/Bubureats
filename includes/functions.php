<?php
function db_query($query, $callback=null){
    global $bdd;
    $results = [];
    foreach($bdd->query($query) as $row) {
        if(function_exists($callback)){
            $row = $callback($row);
        }
        $results[] = $row;
    }

    return $results;
}


function db_get($table, $id=null, $column = 'id', $callback=null){
    global $bdd;
    $results = [];
    $q = "SELECT * FROM $table";
    if (!is_null($id)){
        $q .= " WHERE $column = '$id'";
    }
    foreach($bdd->query($q) as $row) {
        if(function_exists($callback)){
            $row = $callback($row);
        }
        $results[] = $row;
    }

    return $results;
}

/*
Fonction db_insert
$membre = [
    'prenom' => 'jean',
    'nom' => 'paul',
    'mail' => 'jp@wanadoo.fr'
    ];
exemple: $insert = db_insert('membres', $membre);
$insert renvoie un tableau avec ['success'] = true ou false et une erreur si il y en a une.
*/

function db_insert($table, $data) {
    global $bdd;
    $response = ['sucess' => false];

    $keys = array_keys($data);
    $colonnes = [];
    $placeholder = [];

    for ($i=0; $i < count($keys); $i++) { 
        if(!preg_match('/^_/', $keys[$i]) && $keys[$i] != 'MAX_FILE_SIZE'){
            $colonnes[] = $keys[$i];
            $placeholder[] = "?";
        }
        else{
            unset($data[$keys[$i]]);
        }
    }
    $colonnes = implode(',', $colonnes);
    $placeholder = implode(',', $placeholder);
    $q = "INSERT INTO $table ($colonnes) VALUES ($placeholder)";
    $p = $bdd->prepare($q);
    $p->execute(array_values($data));

    $erreur = $p->errorInfo();
    if(!empty($erreur[2])){
        $response['erreur'] = $erreur[2];
    }
    else{
        $response = [
            'success' => true,
            'insertId' => $bdd->lastInsertId()
        ];
        
    }
    return $response;
}

function db_update($table, $id, $data) {
    global $bdd;
    $response = ['success' => false];


    $keys = array_keys($data);
    $colonnes_valeurs = [];
    $placeholder = [];

    for ($i=0; $i < count($keys); $i++) { 
        if(!preg_match('/^_/', $keys[$i]) && $keys[$i] != 'MAX_FILE_SIZE'){
            $colonnes_valeurs[] = $keys[$i]. "= ?";
        }
        else{
            unset($data[$keys[$i]]);
        }
    }
    $colonnes_valeurs = implode(',', $colonnes_valeurs);
    $q = "UPDATE $table SET $colonnes_valeurs WHERE id = $id";
    $p = $bdd->prepare($q);
    $p->execute(array_values($data));

    $erreur = $p->errorInfo();
    if(!empty($erreur[2])){
        $response['erreur'] = $erreur[2];
    }

    else{
    $response = ['success' => true, 'message' => 'Mise à jour réussie.'];
    }
    return $response;
}

function db_delete($table, $id) {
    global $bdd;
    $response = ['sucess' => false];
    
    if(count(db_get($table, $id)) == 0){
        $response['erreur'] = "Valeur introuvable";
        return $response;
    }
    $q = "DELETE FROM $table WHERE id = $id";
    $resultat = $bdd->exec($q);

    $erreur = $bdd->errorInfo();
    if(!empty($erreur[2])){
        $response['erreur'] = $erreur[2];
    }

    else{
    $response = ['sucess' => true, 'erreur' => "C'est bon."]; 
    }

    return $response;
}

function parse($template_name, $data) {
    $template = file_get_contents(ROOT . '/vues/' . $template_name);
    $template = preg_replace_callback(
        '/(\{\{([$a-zA-Z0-9_]+)\}\})/',
        function ($matches) use ($data) {

            if(preg_match('/^\$([a-zA-Z_]+)/', $matches[2], $matches2)){
                return constant($matches2[1]);
            }
            return $data[$matches[2]];
        },
        $template
    );
    return $template;
}

function parse_alert($message, $type = 'danger') {
    $data = [
        'type_alert' => $type,
        'message' => $message
    ];
    return parse('alert.html', $data);
}

function get_commissions($table){
    $commissions = 0;
    $commandes = db_get($table);
    foreach($commandes as $commande){
        $commissions += $commande['montant_commission'];
    }

    return $commissions;
}

function upload() {
    $uploaddir = ROOT . '/uploads/';
    $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
    echo $uploadfile;

    echo '<pre>';
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
        echo "Le fichier est valide, et a été téléchargé
            avec succès. Voici plus d'informations :\n";
    } else {
        echo "Attaque potentielle par téléchargement de fichiers.
            Voici plus d'informations :\n";
    }

    echo 'Voici quelques informations de débogage :';
    print_r($_FILES);

    echo '</pre>';
}

function envoiEmail ($destinataire, $expediteur, $sujet, $contenuHTML) {

    // ça ne fonctionne pas encore mais je vais me coucher... A demain.
    $response = ['success' => false];

    $headers = 
    'MIME-Version: 1.0' . "\r\n" .
    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
    'From: ' . $expediteur . "\r\n" .
    'Reply-To: ' . $expediteur . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $send = mail($destinataire, $sujet, $contenuHTML, $headers);
    if (!$send) {
        $response['erreur'] = error_get_last();
    }
    else {
        $response['success'] = true;
    }

    return $response;
}

function get_commandes($statut){
    $commandes = db_get('commandes', $statut, 'statut', 'get_commande_details');
    return $commandes;
}

function get_commande_details($commande){
    $commande['client'] = db_get('membres', $commande['id_client'])[0];
    $commande['nom_client'] = $commande['client']['nom'] . " " . $commande['client']['prenom'];
    $commande['restaurant'] = db_get('restaurants', $commande['id_restaurant'])[0];
    $commande['nom_restaurant'] = $commande['restaurant']['nom'];
    $commande['mail'] = $commande['restaurant']['email'];
    $commande['prix'] = ($commande['total_ht'] + $commande['montant_commission']);
    $commande['is_atraiter'] =  $commande['statut'] == 'atraiter' ? ' checked' : null;
    $commande['is_enpreparation'] =  $commande['statut'] == 'enpreparation' ? ' checked' : null;
    $commande['is_enlivraison'] =  $commande['statut'] == 'enlivraison' ? ' checked' : null;
    $commande['is_terminee'] =  $commande['statut'] == 'terminee' ? ' checked' : null;
    $livraison = heure_livraison($commande['date_commande']);
    $commande['heure_livraison'] = $livraison['heure_livraison'];

    $commande['liste_plats'] = '';
    foreach(json_decode($commande['plats'], true) as $plat) {
        $commande['liste_plats'] .= parse('admin/plats-card-statut.html', $plat);
    }
    $commande['liste_plats_client'] = '';
    foreach(json_decode($commande['plats'], true) as $plat) {
        $plat['id_client'] = $commande['id_client'];

        $note = db_query("SELECT * FROM notes WHERE id_client = " . $commande['id_client'] . " AND id_plat = " . $plat['id']);
        if(count($note) > 0){
            $n = (int)$note[0]['note'];
            for ($i=1; $i < 6; $i++) { 
                $plat['is_on_' . $i] = $i <= $n ? ' text-success' : null;
            }
            $commande['liste_plats_client'] .= parse('plats_liste_note.html', $plat);
        }
        else{
            $commande['liste_plats_client'] .= parse('plats_liste.html', $plat);
        }
    }

    return $commande;
}

function debug($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function heure_livraison($datetime){
    $d = new DateTime($datetime);
    $heure_commande = $d->format('H:i:s');
    $date_commande = $d->format('d/m/Y');
    $d->add(new DateInterval('PT' . TEMPS_LIVRAISON . 'M'));
    $date_livraison = $d->format('d/m/Y');
    $heure_livraison = $d->format('H:i:s');
    $livraison = [
        'heure_commande' => $heure_commande,
        'date_commande' => $date_commande,
        'heure_livraison' => $heure_livraison,
        'date_livraison' => $date_livraison,
    ];
    return $livraison;
}

function calcul_moyenne($row) {

    $row['moyenne'] = $row['nb_votes'] > 0 ? floor($row['cumul_notes']/$row['nb_votes']) : 0;
    $row['note'] = '';
    for ($i=0; $i < 5; $i++) {
        if ($row['moyenne'] > 0 && $row['moyenne'] >= $i){
            $row['note'] .= '<i class="fas fa-star text-success"></i>';
        }
        else{
            $row['note'] .= '<i class="fas fa-star"></i>';
        }
    }
    return $row;
}