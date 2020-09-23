<?php

require __DIR__.'/../vendor/autoload.php';


$uri = urldecode(
	parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);
echo '<pre>';
var_dump($uri);
if ($uri !== '/' && file_exists(__DIR__.'/'.$uri)) {
	return false;
}

$route = require_once __DIR__.'/../routes/web.php';


var_dump($route['checkDomain']);