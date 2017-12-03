<?php

require_once "vendor/autoload.php";

use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;

require_once "src/setup.php";

$dispatcher = new Dispatcher($router->getData());

try {

	$response = $dispatcher->dispatch(
		$_SERVER['REQUEST_METHOD'],
		!empty($_GET["path"]) ? $_GET["path"] : "/"
	);

} catch (HttpRouteNotFoundException $e) {

	$response = $dispatcher->dispatch("GET", "/404");

} catch (HttpMethodNotAllowedException $e) {

	$response = $dispatcher->dispatch("GET", "/404");

}

echo $response;