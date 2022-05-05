<?php
require_once 'src/app/NewsController.php';
error_reporting(1);
spl_autoload_register(function ($class_name) {
    $file = 'src/app/' . $class_name . '.php';
	require_once $file;
});
$uri = $_SERVER['REQUEST_URI'];
$matches = [];

$controller = false;
$action = false;
$params = [];
if (preg_match('[^/news/?\%]', $uri)) {
	$controller = 'NewsController';
	$action = 'renderList';
} elseif (preg_match('[/news/page-(\d+)/?]', $uri, $matches)) {
	$controller = 'NewsController';
	$action = 'renderList';
	$params = $matches[1];
} elseif (preg_match('[/news/(\d+)/?]', $uri, $matches)) {
	$controller = 'NewsController';
	$action = 'renderDetail';
	$params = $matches[1];
} elseif (preg_match('[html]', $uri)) {
	$controller = 'NewsController';
	$action = 'renderMainPage';
} else {
	$controller = 'NewsController';
	$action = 'renderList';
}

$controller = new $controller();

call_user_func([$controller, $action], $params);
