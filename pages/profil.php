<?php
if($userinfo['role'] != 'admin'){
    include "vues/profil-" .$userinfo['role'].".php";
}
else{
    header("Location: admin/");
}