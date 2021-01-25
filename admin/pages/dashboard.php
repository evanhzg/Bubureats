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
</div>