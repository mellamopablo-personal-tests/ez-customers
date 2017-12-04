<?php

use Controller\CustomerViewController;
use Controller\DeleteCustomerActionController;
use Controller\LoginActionController;
use Controller\LoginViewController;
use Controller\CustomerListViewController;
use Controller\MainController;
use Controller\NewCustomerViewController;
use Controller\NewCustomerActionController;
use Controller\NotFoundViewController;
use Controller\UpdateCustomerActionController;
use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

$router->get("/", function() {
	return (new MainController())->configure();
});

$router->get("/login", function() {
	return (new LoginViewController())->render();
});

$router->get("/customers", function() {
	return (new CustomerListViewController())->render();
});

$router->get("/customers/new", function() {
	return (new NewCustomerViewController())->render();
});

$router->post("/customers", function() {
	return (new NewCustomerActionController())->configure();
});

$router->get("/customers/{id}", function($id) {
	return (new CustomerViewController($id))->render();
});

$router->put("/customers/{id}", function($id) {
	return (new UpdateCustomerActionController($id))->configure();
});

$router->delete("/customers/{id}", function($id) {
	return (new DeleteCustomerActionController($id))->configure();
});

$router->post("/actions/login", function() {
	return (new LoginActionController())->configure();
});

$router->get("/404", function() {
	return (new NotFoundViewController())->render();
});
