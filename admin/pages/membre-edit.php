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

<div class="row">
    <div class="col-md-4">
    <?php    
        echo parse('admin/membre-formedit.html', $membre);
    ?>
    </div>

    <div class="col-md-8">
    <?php
        include 'vues/membre-dashboard-' . $membre['role'] . '.php';
    ?>
    </div>
</div>