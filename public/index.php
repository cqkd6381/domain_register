<?php

require __DIR__.'/../vendor/autoload.php';


$uri = urldecode(
	parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ($uri !== '/' && file_exists(__DIR__.'/'.$uri)) {
	return false;
}

$route = require_once __DIR__.'/../routes/web.php';

if(isset($route[substr($uri, 1)])){
    $arr = explode('@', $route[substr($uri, 1)]);
    try {
        $reflectionMethod  = new \ReflectionMethod($arr[0], $arr[1]);
        echo $reflectionMethod->invoke(new $reflectionMethod->class);
    } catch (ReflectionException $e) {
        echo $e->getLine() . '-' . $e->getMessage();
    }
}else{
	header("HTTP/1.1 404 Not Found");
	header("Status: 404 Not Found");
}

exit;