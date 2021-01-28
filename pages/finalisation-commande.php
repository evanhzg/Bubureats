<div class="container">
    <h1 class="text-center">Récapitulatif de votre commande</h1>
    <?php
        foreach($panier->plats as $plat) {
        echo parse('plat-panier-confirmation.html', $plat);
        }
    ?>

    <a href="index.php?page=finalisation-commande&payer" class="btn btn-lg btn-primary confirm">Payer</a>
</div>