<?php
session_start();
require_once 'common.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    session_destroy();
    $GLOBALS['LOG']("Ein unberechtigter zugriff auf die Register vorgänge hat stattgefunden stattgefunden!","WARN");
    header ("Location: http://hol.spaceoflegends.de/hol/index.php");
    die();
}else{
    $a = new System\UserFormCheck();
    if($a->checkregisterData()){
        header("Location: http://hol.spaceoflegends.de/hol/index.php?sueccfull=true");
    }
    else{
        header("Location: http://hol.spaceoflegends.de/hol/index.php?sueccfull=false");
        
    }
}