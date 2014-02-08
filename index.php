<?php
session_start();

require_once 'common.php';
if(!isset($_GET)){
    
}
elseif($_GET['sueccfull']){
    $_POST['what'] = 'register_true';
}
else{
    $_POST['what'] = 'register_false';
}
$site = new \System\HTML\BuildSite();
