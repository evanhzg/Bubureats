<?php
define('ROOT', realpath(dirname(__DIR__)));
define('WEBSITE_URL', 'http://localhost/bubureats');
define('ADMIN_URL', 'http://localhost/bubureats/admin/');
define('ADMIN_ROOT', ROOT . '/admin');

include ROOT . '/includes/connexion.db.php';
include ROOT . '/includes/functions.php';
include ROOT . '/includes/functions.auth.php';
include ROOT . '/includes/controller.auth.php';

$configuration = db_get('configuration', 1)[0];
define('MONTANT_COMMISSION', $configuration['montant_commission']);
define('TEMPS_LIVRAISON', $configuration['temps_livraison']);