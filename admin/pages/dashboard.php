<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">
    <?php
    echo parse('admin/stats-total.html', [
        'total' => $stats['nb_restaurants'],
        'titre' => 'Nombre de restaurants',
        'icon_class' => 'fas fa-utensils',
        'color' => 'success'
    ]);

    echo parse('admin/stats-total.html', [
        'total' => $stats['nb_membres'],
        'titre' => 'Nombre de membres',
        'icon_class' => 'fas fa-users',
        'color' => 'info'
    ]);

    echo parse('admin/stats-total.html', [
        'total' => $stats['nb_commandes'],
        'titre' => 'Nombre de commandes passées',
        'icon_class' => 'fas fa-shopping-cart',
        'color' => 'danger'
    ]);

    echo parse('admin/stats-total.html', [
        'total' => $stats['total_commissions'],
        'titre' => 'Revenus totaux des commissions',
        'icon_class' => 'fas fa-wallet',
        'color' => 'danger'
    ]);
    ?>
<div class="card mt-4 w-100" id="accordion">
    <div class="card-header pt-0">
        <ul class="nav nav-tabs card-header-tabs nav-pills nav-fill ">
        <li class="nav-item">
            <button class="btn btn-link" data-toggle="collapse" data-target="#encours" aria-expanded="true" aria-controls="encours">
                Commandes en cours
            </button>
        </li>
        <li class="nav-item">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#terminees" aria-expanded="false" aria-controls="terminees">
                Commandes terminées
            </button>
        </li>
        <li class="nav-item">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#avis" aria-expanded="false" aria-controls="avis">
                Avis des clients (<? echo $stats['nb_avis'];?>)
            </button>
        </li>
        </ul>
    </div>
    <div class="card-body">
        <div id="encours" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="text-center">À traiter</h2>
                <?php
                foreach ($stats['commandes_atraiter'] as $commande) {
                    echo parse('admin/commandes-cards.html', $commande);
                }
                ?>
                </div>
                <div class="col-md-4">
                    <h2 class="text-center">En préparation</h2>
                <?php
                foreach ($stats['commandes_enpreparation'] as $commande) {
                    echo parse('admin/commandes-cards.html', $commande);
                }
                ?>
                </div>
                <div class="col-md-4">
                    <h2 class="text-center">En livraison</h2>
                <?php
                foreach ($stats['commandes_enlivraison'] as $commande) {
                    echo parse('admin/commandes-cards.html', $commande);
                }
                ?>
                </div>
            </div>
        </div>
        <div id="terminees" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            
            <h2 class="text-center">Terminées</h2>
                <?php
                foreach ($stats['commandes_terminees'] as $commande) {
                    echo parse('admin/commandes-cards.html', $commande);
                }
                ?>
        </div>
        <div id="avis" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <h2 class="text-center">Avis des clients</h2>
                <?php
                foreach ($restaurants as $restaurant){
                    ?>
                    <div id="avis" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="text-center card-header collapsed" data-toggle="collapse" data-target="#commande-collapse-{{id}}" aria-expanded="false" aria-controls="commande-collapse-{{id}}">
                            <?php echo $restaurant['nom']; ?>
                        </div>
                    <?php
                        foreach ($avis as $avi) {
                            if ($avi['id_restaurant'] == $restaurant['id']){ //A TERMINER ( COLLAPSE RESTAURANT AVEC AVIS DEDANS + CREER AVIS ET NOTER)
                                $avi['nom_client'] = $membres['nom'];
                                echo parse('admin/avis-cards.html', $avi);
                            }
                        }
                    ?>
                    </div>
                <?php
                }
                ?>
        </div>
    </div>
</div>
