<?php
// App name
define('SITE_NAME', 'Log File Viewer');

// App Root
define('APP_ROOT', dirname(__DIR__));
define('URL_ROOT', '/');
define('URL_SUBFOLDER', '');
define('PORT', '9090');
$baseUrl = "http://".$_SERVER['SERVER_NAME'].':'.PORT.dirname($_SERVER["REQUEST_URI"].'?');
$baseUrl = str_replace('\\', '/', $baseUrl);
define('baseUrl' ,$baseUrl);

