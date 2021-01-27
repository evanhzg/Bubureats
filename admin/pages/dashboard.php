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
<div class="card mt-4 w-100">
    <div class="card-header pt-0">
        <ul class="nav nav-tabs card-header-tabs nav-pills nav-fill ">
        <li class="nav-item">
            <a class="nav-link active" href="#">Commandes en cours</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-success" href="#">Commandes terminées</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Avis des clients</a>
        </li>
        </ul>
    </div>
    <div class="card-body">
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
</div>
