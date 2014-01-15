<?php
session_start();
require_once 'common.php';
if(!System\Security::isAjax()){
    $Login = new System\UserFormCheck;
    System\HTML::printMainHeader();
    System\HTML::printMainBody();
    if($_POST['logout']){
        
    }
    if(isset($_POST['doRegister'])){
        $alpha = $Login->checkregisterData();
        print_r($alpha);
        if($alpha != 1){
            System\HTML::insertDiv($alpha,"test2","background:red;");
            echo  "<br/><a href='javascript:fenster1();'>Login</a><br/>";
            echo  "<a href='javascript:fenster2();'>Register</a><br/>";
            System\HTML::closeDiv();
        }
        else{
           print_r($_POST);
            System\HTML::insertDiv("Hallo!","test2","background:silver;height:80px;");
            echo  "<br/><a href='javascript:fenster1();'>Login</a><br/>";
            echo  "<a href='javascript:fenster2();'>Register</a><br/>";
            System\HTML::closeDiv(); 
        }
    }
    if($Login->checkLoginData()){
        $USER = new System\Daten\User($_POST['login']);
        print_r($USER);
        $text = "willkommen ".$USER->user[1]['login']."<br/>";
        System\HTML::insertDiv($text,"test2","background:green;height:80px;");
        echo  "<br/><a href='javascript:fenster3();'>Logout</a><br/>";
        System\HTML::closeDiv();
    }
    else{
        if(isset($_POST['doLogin'])){
            System\HTML::insertDiv("Leider Fehlgeschlagen","test2","background:red;height:80px;");
            echo  "<br/><a href='javascript:fenster1();'>Login</a><br/>";
            echo  "<a href='javascript:fenster2();'>Register</a><br/>";
            System\HTML::closeDiv();
        }
        elseif(!isset($_POST['doRegister'])){
            print_r($_POST);
            System\HTML::insertDiv("Hallo!","test2","background:silver;height:80px;");
            echo  "<br/><a href='javascript:fenster1();'>Login</a><br/>";
            echo  "<a href='javascript:fenster2();'>Register</a><br/>";
            System\HTML::closeDiv();
        }
    }
}else{
    require_once PROJECT_DOCUMENT_ROOT.'/inc/functions/Ajax/function.AjaxMain.php';
}
System\HTML::printMainFooter();

