<?php
session_start();
require_once 'common.php';
if(isset($_POST['doLogin'])){
    $login = new System\UserFormCheck();
    if(!($login->checkLoginData())){
        \System\Security::anError(100);
    }
}
if(\System\Security::isLogin()){
    print_r($_SESSION);
    buildSite();
}else{
    if(!isset($_SESSION['login'])){
        \System\Security::anError(1);
    }
    else{
        \System\Security::anError(101);
    }
}

function buildSite(){
    $site = new Game\Build();
}
