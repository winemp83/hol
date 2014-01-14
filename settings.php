<?php
error_reporting(E_ALL);

define('DEBUG', true);

define('DB_SERVER', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_NAME', 'hol');
define('DB_USER', 'devel');
define('DB_PASSWORD', '&4Em1qi5');

define('HTML_TITLE', "Hack the Legend");
date_default_timezone_set('Europe/Berlin');

require_once PROJECT_DOCUMENT_ROOT.'/lng/de_DE/main.php';