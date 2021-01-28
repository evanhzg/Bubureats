<?php
include 'includes/define_includes.php';
include ROOT . '/includes/controller.auth.php';
include 'includes/controller.panier.php';
include ROOT . '/includes/controller.auth.php';
include 'includes/controller.php';

include 'vues/header.php'; 
include 'pages/' . $page . '.php';
include 'vues/footer.php';