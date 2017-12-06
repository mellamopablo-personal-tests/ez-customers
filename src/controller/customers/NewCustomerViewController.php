<?php

namespace Controller;

use Model\User;

/**
 * Class NewCustomerViewController
 *
 * Controlador que se encarga de renderizar la vista de creación de clientes.
 *
 * @package Controller
 */
class NewCustomerViewController extends ViewController {

	function getTemplateName() {
		return "newCustomer";
	}

	function getRouteAccessibility() {
		return "authenticated";
	}

	function getData() {
		return [
			"user" => User::find($_SESSION["loggedInUserId"]),
			"errors" => $this->takeValidationErrors()
		];
	}

}