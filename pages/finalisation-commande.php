
<?php
    foreach($panier->plats as $plat) {
    echo parse('plat-panier.html', $plat);
    }
?>

<a href="index.php?page=finalisation-commande&payer" class="btn btn-lg btn-primary">Payer</a>
