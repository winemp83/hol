<?php
header('Content-Type: text/html');
switch ($_POST['option']){
    case 1: require_once PROJECT_DOCUMENT_ROOT.'/inc/class/HTML/class.UserForms.php';
            $login = new System\UserForms();
            $login->printLoginForm();
            break;
    case 2: require_once PROJECT_DOCUMENT_ROOT.'/inc/class/HTML/class.UserForms.php';
            $register = new System\UserForms();
            $register->printRegisterForm();
            break;
    case 3: require_once PROJECT_DOCUMENT_ROOT.'/inc/class/HTML/class.UserForms.php';
            $logout = new System\UserForms();
            $logout->printLogoutForm();
            break;
    default:
            echo "Sie müssen sich Einlogen um auf die Funktionen zugriff zu erhalten!";
            break;
}



