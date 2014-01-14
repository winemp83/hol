<?php
define('PROJECT_DOCUMENT_ROOT', __DIR__);

define('PROJECT_CSS_ROOT', __DIR__.'/style/css');
define('PROJECT_JS_ROOT', __DIR__.'/style/js');

$project = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace("\\", "/", __DIR__));

(!isset($_SERVER['HTTPS']) OR $_SERVER['HTTPS']=='off') ? $protocol = 'http://' : $protocol = 'https://';

define('PROJECT_HTTP_ROOT', $protocol.$_SERVER['HTTP_HOST'].$project);