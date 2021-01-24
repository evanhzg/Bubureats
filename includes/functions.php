<?php
function db_get($table, $id=null, $column = 'id'){
    global $bdd;
    $results = [];
    $q = "SELECT * FROM $table";
    if (!is_null($id)){
        $q .= " WHERE $column = $id";
    }
    foreach($bdd->query($q) as $row) {
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

    $colonnes = array_keys($data);
    $placeholder = [];
    for ($i=0; $i < count($colonnes); $i++) { 
        $placeholder[] = "?";
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
    $response = ['sucess' => false];

    $colonnes = array_keys($data);
    for ($i=0; $i < count($colonnes); $i++) { 
        $colonnes_valeurs[] = $colonnes[$i]. "= ?";
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
    $response = ['sucess' => true];
    }
    return $response;
}

function db_delete($table, $id) {
    global $bdd;
    $response = ['sucess' => false];
    
    if(count(db_get('membres', $id)) == 0){
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
        '/(\{\{([a-z_]+)\}\})/',
        function ($matches) use ($data) {
            //var_dump($matches);
            return $data[$matches[2]];
        },
        $template
    );
    echo $template;
}