<?php
require_once 'common.php';
if($_SESSION['0']['auth_level'] != 3 || $_SESSION['0']['auth_level'] != 2){
    \System\Security::anError(1);
}

