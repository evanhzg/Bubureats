<?php
// Connexion à la bdd
$bdd = new PDO('mysql:host=localhost;dbname=bubureats','root','');
$bdd->exec("SET NAMES UTF8");
$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);