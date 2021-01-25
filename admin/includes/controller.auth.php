<?php
include ROOT . "/includes/functions.auth.php";
$login = null;

if (isset($is_login_page)) {
    unset($_SESSION['admin']);
}
//redirection si non-connecté
if(!isset($_SESSION['admin']) && !isset($is_login_page)){
    header("location: " . ADMIN_URL . "pages/login.php");
}
if(isset($_POST['loginform'])){
    $login = auth_login_admin($_POST);
}

if(isset($_GET['logout'])){
    auth_logout();
}

if(isset($_POST['formEditProfile'])){
    $update_profile = auth_update_profile();
}

if(isset($_POST['forminscription'])){
    $create_profile = auth_create_profile();
}