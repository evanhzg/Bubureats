<?php
function db_get($table, $id=null, $column = 'id', $callback=null){
    global $bdd;
    $results = [];
    $q = "SELECT * FROM $table";
    if (!is_null($id)){
        $q .= " WHERE $column = $id";
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
        if(!preg_match('/^_/', $keys[$i])){
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
    $response = ['sucess' => true];
        
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
        if(!preg_match('/^_/', $keys[$i])){
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
        '/(\{\{([$a-zA-Z_]+)\}\})/',
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