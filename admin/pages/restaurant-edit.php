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
        echo parse('admin/restaurant-formedit.html', $restaurant);
    ?>
    </div>

    <div class="col-md-8">
    <?php
        //include 'vues/restaurant-dashboard-' . $plats['role'] . '.php';
    ?> 
    </div>
</div>