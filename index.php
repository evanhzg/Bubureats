<?php
session_start();

//include 'includes/connexion.db.php';
//include 'includes/functions.auth.php';
//include 'includes/functions.php';
include 'includes/define_includes.php';
include 'includes/controller.panier.php';
include ROOT . '/includes/controller.auth.php';
include 'includes/controller.php';

include 'vues/header.php'; 
include 'pages/' . $page . '.php';
include 'vues/footer.php';