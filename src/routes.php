<?php

use Controller\BillViewController;
use Controller\CustomerViewController;
use Controller\DeleteBillActionController;
use Controller\DeleteCustomerActionController;
use Controller\DeleteUserActionController;
use Controller\LoginActionController;
use Controller\LoginViewController;
use Controller\CustomerListViewController;
use Controller\MainController;
use Controller\NewBillActionController;
use Controller\NewBillViewController;
use Controller\NewCustomerViewController;
use Controller\NewCustomerActionController;
use Controller\NewUserActionController;
use Controller\NewUserViewController;
use Controller\NotFoundViewController;
use Controller\UpdateBillActionController;
use Controller\UpdateCustomerActionController;
use Controller\UpdateUserActionController;
use Controller\UserListViewController;
use Controller\UserViewController;
use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

///// MAIN /////

$router->get("/", function() {
	return (new MainController())->configure();
});

///// LOGIN /////

$router->get("/login", function() {
	return (new LoginViewController())->render();
});

$router->post("/actions/login", function() {
	return (new LoginActionController())->configure();
});

///// CUSTOMERS /////

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

///// CUSTOMERS --> BiLLS /////

$router->get("/customers/{id}/bills/new", function($id) {
	return (new NewBillViewController($id))->render();
});

$router->post("/customers/{id}/bills", function($id) {
	return (new NewBillActionController($id))->configure();
});

$router->get("/customers/{cId}/bills/{bId}", function($cId, $bId) {
	return (new BillViewController($cId, $bId))->render();
});

$router->put("/customers/{cId}/bills/{bId}", function($cId, $bId) {
	return (new UpdateBillActionController($cId, $bId))->configure();
});

$router->delete("/customers/{cId}/bills/{bId}", function($cId, $bId) {
	return (new DeleteBillActionController($cId, $bId))->configure();
});

///// USERS /////

$router->get("/users", function() {
	return (new UserListViewController())->render();
});

$router->get("/users/new", function() {
	return (new NewUserViewController())->render();
});

$router->post("/users", function() {
	return (new NewUserActionController())->configure();
});

$router->get("/users/{id}", function($id) {
	return (new UserViewController($id))->render();
});

$router->put("/users/{id}", function($id) {
	return (new UpdateUserActionController($id))->configure();
});

$router->delete("/users/{id}", function($id) {
	return (new DeleteUserActionController($id))->configure();
});

///// SPECIAL /////

$router->get("/404", function() {
	return (new NotFoundViewController())->render();
});
