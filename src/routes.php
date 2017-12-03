<?php

use Controller\MainController;
use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

$router->get("/", function() {
	return (new MainController())->render();
});

$router->get("/hola", function() {
	return "Mundo";
});

$router->get("/404", function() {
	return "404 Not found";
});
