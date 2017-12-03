<?php

use Controller\LoginController;
use Controller\MainController;
use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

$router->get("/", function() {
	return (new MainController())->render();
});

$router->post("/actions/login", function() {
	return (new LoginController())->handleLogin();
});

$router->get("/404", function() {
	return "404 Not found";
});
