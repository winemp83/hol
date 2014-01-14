<?php
header('Content-Type: text/html');
switch ($_POST['option']){
    case 1: echo "test";
            $GLOBALS['LOG']("Wir haben einen Request");
            break;
    default:
            echo "Sie müssen sich Einlogen um auf die Funktionen zugriff zu erhalten!";
            break;
}



