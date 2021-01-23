<?php
$login = null;
if(isset($_POST['formconnect']))
{
    $login = auth_login($_POST);
}

if(isset($_SESSION['id'])){
    $userinfo = auth_getUser($_SESSION['id']);
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