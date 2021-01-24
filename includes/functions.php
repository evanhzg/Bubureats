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

function db_insert($table, $data) {
    global $bdd;
    $q = "";
}

function db_update($table, $id, $data) {
    
}

function db_delete($table, $id) {
    
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