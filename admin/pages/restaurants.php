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
            <td>Nom du restaurant</td>
            <td>Nom du gérant</td>
            <td>Photo</td>
            <td>tags</td>
            <td>Mail de contact</td>
            <td>Ville</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php
        for($i=0; $i<count($restaurants); $i++){
            echo parse('admin/restaurants-tableau.html', $restaurants[$i]);
        }
        ?>
    </tbody>
</table>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nouveaurestaurant"><i class="fas fa-user-plus"></i> Ajouter un restaurant</button>