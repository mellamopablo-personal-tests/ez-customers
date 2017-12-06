<?php

namespace Controller;

use Model\Customer;

/**
 * Class DeleteCustomerActionController
 *
 * Controlador que se encarga de procesar las peticiones de borrado de clientes.
 *
 * @package Controller
 */
class DeleteCustomerActionController extends ActionController {

	private $customerId;

	function getRouteAccessibility() {
		return "customerOwner:$this->customerId";
	}

	function __construct($customerId) {
		$this->customerId = $customerId;
	}

	function performAction() {
		Customer::find($this->customerId)->delete();

		self::redirect("/customers");
	}

}