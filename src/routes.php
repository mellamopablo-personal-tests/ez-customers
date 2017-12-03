<?php

use Controller\LoginActionController;
use Controller\LoginViewController;
use Controller\CustomersViewController;
use Controller\MainController;
use Controller\NewCustomerViewController;
use Controller\NewCustomerActionController;
use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

$router->get("/", function() {
	return (new MainController())->configure();
});

$router->get("/login", function() {
	return (new LoginViewController())->render();
});

$router->get("/customers", function() {
	return (new CustomersViewController())->render();
});

$router->get("/customers/new", function() {
	return (new NewCustomerViewController())->render();
});

$router->post("/customers", function() {
	return (new NewCustomerActionController())->configure();
});

$router->post("/actions/login", function() {
	return (new LoginActionController())->configure();
});

$router->get("/404", function() {
	return "404 Not found";
});
