
<?php
$commande = db_get('commandes', $_GET['commande'])[0];

$d = new DateTime($commande['date_commande']);
$date_commande = $d->format('d/m/Y');
$d->add(new DateInterval('PT1H'));
$date_livraison = $d->format('d/m/Y');
$heure = $d->format('H:i:s');
echo "Commande passée: " . $date_commande . " - arrivée prévue à " . $date_livraison;


?>
<div class="container">
    <h1 class="text-center mt-4">Merci pour votre commande</h1>
    <p>Livraison estimée vers: <?php echo 'oui'?></p>
</div>