<?php
include(__DIR__.'/paths.php');
require_once PROJECT_DOCUMENT_ROOT.'/settings.php';
require_once PROJECT_DOCUMENT_ROOT.'/inc/class/includeAllClasses.php';
require_once PROJECT_DOCUMENT_ROOT.'/inc/functions/includeAllFunctions.php';

if(!isset($GLOBALS['DATABASE'])){
    $DATABASE = new \Database\MySQL(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
}
if(!isset($GLOBALS['LOG'])){
    $LOG = new System\Logging();
}
if(!isset($GLOBALS['onfig'])){
    $config = new System\Daten\config();
    $config = $config->config;
}
