<?php
$insert = db_insert('membres', ['prenom' => 'jean','nom' => 'paul', 'mail' => 'jp@wanadoo.fr']);
//$update = db_delete('membres', 57);
if(isset($update['erreur'])){
    echo parse('alerte-erreur.html', $update);
}

?>
<table id="table_id" class="display dataTable">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Mail</td>
            <td>Solde</td>
            <td>Role</td>
        </tr>
    </thead>
    <tbody>
        <?php
        for($i=0; $i<count($membres); $i++){
            echo parse('admin/membres-tableau.html', $membres[$i]);
        }
        ?>
    </tbody>
</table>