<?php
define('ROOT', realpath(dirname(__DIR__)));
define('WEBSITE_URL', 'http://localhost/bubureats');
define('ADMIN_URL', 'http://localhost/bubureats/admin/');
define('ADMIN_ROOT', ROOT . '/admin');
define('MONTANT_COMMISSION', 2.5);
define('TEMPS_LIVRAISON', 1);

include ROOT . '/includes/connexion.db.php';
include ROOT . '/includes/functions.php';
include ROOT . '/includes/functions.auth.php';
include ROOT . '/includes/controller.auth.php';

