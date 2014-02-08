<?php
session_start();
require_once 'common.php';
$navi = new \System\HTML\Navigation();
$logout = filter_input(INPUT_POST, 'doLogout', FILTER_SANITIZE_STRING);
if(isset($logout)){
    session_destroy();
    $GLOBALS['LOG']("Ein Spieler hat sich ausgelogt!","WARN");
   header ("Location: http://hol.spaceoflegends.de/hol/index.php");
    die();
}
if(\System\Security::isAjax()){
    $responseA = new \Game\Forms();
    $responseB = new \Game\FormsCheck();
    $post = filter_input(INPUT_POST, 'what', FILTER_SANITIZE_STRING);
    switch($post){
        case 'logout' :
            $responseA->printLogoutForm('ajax.php');
            break;
        case 'bank' :
            $navi->showMenue(3);
            break;
        case 'option' :
            $navi->showMenue(6);
            break;
        case 'build' :
            $navi->showMenue(4);
            break;
        case 'markt' :
            $navi->showMenue(5);
            break;
        case 'alliance' :
            $navi->showMenue(7);
            break;
        case 'option_player' : 
            $responseA->printPlayerOptions('ajax.php');
            break;
        case 'option_game' :
            $responseA->printGameOptions('ajax.php');
            break;
        case 'option_holiday' :
            $responseA->printHolidayOptions('ajax.php');
            break;
        case 'option_del' :
            $responseA->printDelOptions('ajax.php');
            break;
        case 'bank_set' :
            $responseA->printPayinForm('ajax.php');
            break;
        case 'markt_buy' :
            $responseA->printMarktBuyForm('ajax.php');
            break;
        case 'markt_sell' :
            $responseA->printMarktSellForm('ajax.php');
            break;
        case 'markt_trader' :
            $responseA->printTraderForm('ajax.php');
            break;
        case 'markt_offiziere' :
            $responseA->printOffiziereForm('ajax.php');
            break;
        case 'build_troops' :
            $responseA->printTroopsForm('ajax.php');
            break;
        case 'build_factory' :
            $responseA->printFactoryForm('ajax.php');
            break;
        case 'build_shipyard' :
            $responseA->printHangarForm('ajax.php');
            break;
       default :
            print_r($post);
            break;
    }
}
else{
    \System\Security::anError(1);
}