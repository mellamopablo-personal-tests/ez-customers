<?php

namespace Controller;

use Model\Customer;

/**
 * Class CustomerViewController
 *
 * Controlador que se encarga de renderizar la vista de clientes.
 *
 * @package Controller
 */
class CustomerViewController extends ViewController {

	private $customerId;

	function getTemplateName() {
		return "customer";
	}

	function getRouteAccessibility() {
		return "customerOwner:$this->customerId";
	}

	function __construct($customerId) {
		$this->customerId = $customerId;
	}

	function getData() {
		$customer = Customer::find($this->customerId);

		return [
			"customer" => $customer,
			"customerBills" => $customer->getBills(),
			"errors" => $this->takeValidationErrors()
		];
	}

}