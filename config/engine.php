<?php
include_once('Router.php');
include_once('routes.php');

$configs = include('config.php');
$requestURI = explode('/', $_SERVER['REQUEST_URI']);
$scriptName = explode('/', $_SERVER['SCRIPT_NAME']);

for ($i = 0; $i < sizeof($scriptName); $i++) {
    if ($requestURI[$i] == $scriptName[$i]) {
        unset($requestURI[$i]);
    }
}

$command = array_values($requestURI);
$url = '/' . implode('/', $command) . '/';
if ($url == '//') {
    include_once($configs['views'] . '/' . $configs['index']);
    return;
}

// always remove domain name if exists
if(str_replace('x-appointment', '', $url)) {
    $url = str_replace('x-appointment', '', $url);
}

$routes = Router::getArray();
foreach ($routes as $route) {
    if (str_replace('/', '', $url) == str_replace('/', '', $route['link'])) {
        include_once($configs['views'] . '/' . $route['url']);
        return;
    }
}
include_once('views/' . $configs['handler']);