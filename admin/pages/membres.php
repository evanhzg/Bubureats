<?php
if (isset($update)) {
    if(isset($update['erreur'])){
        echo parse_alert($update['erreur'], 'danger');
    }
    if($update['success']){
        echo parse_alert("Opération réussie", 'success');
    }
}

?>
<table id="table_id" class="display dataTable">
    <thead>
        <tr>
            <td></td>
            <td>ID</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Mail</td>
            <td>Solde</td>
            <td>Role</td>
            <td></td>
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

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user-plus"></i> Ajouter un membre</button>