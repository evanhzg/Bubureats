
<?php
debug($commande);

$d = new DateTime($commande['date_commande']);
$date_commande = $d->format('d/m/Y');
$heure_commande = $d->format('H:i:s');
$d->add(new DateInterval('PT' . TEMPS_LIVRAISON . 'M'));
$date_livraison = $d->format('d/m/Y');
$heure_livraison = $d->format('H:i:s');


?>
<div class="container">
    <div class="row">
        <div class="card mx-auto p-4">
            <h1 class="text-center text-primary">Merci pour votre commande.</h1>
            <h3 class="text-center">Un mail de confirmation vous a été envoyé.</h3>
            <h6 class="text-center mt-4"><?php echo "Commande passée le " . $date_commande . " à " . $heure_commande . "."?></h6>
            <h6 class="text-center mb-4"><?php echo "Réception prévue le " . $date_livraison . " à " . $heure_livraison . "."?></h6>
            <h6 class="text-center text-primary">Récapitulatif de votre commande</h6>
            <?php
                foreach($plats as $plat){
                    echo $plat;
                }
            ?>
        </div>
    </div>
</div>