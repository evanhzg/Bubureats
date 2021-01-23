<?php
// Connexion à la bdd
$bdd = new PDO('mysql:host=localhost;dbname=bubureats','root','');
$bdd->exec("SET NAMES UTF8");