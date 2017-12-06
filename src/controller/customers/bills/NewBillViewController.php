<?php

namespace Controller;

use Model\Customer;

/**
 * Class NewBillViewController
 *
 * Controlador que se encarga de renderizar la vista de creación de facturas.
 *
 * @package Controller
 */
class NewBillViewController extends ViewController {

	private $customerId;

	function getTemplateName() {
		return "newBill";
	}

	function getRouteAccessibility() {
		return "customerOwner:$this->customerId";
	}

	function __construct($customerId) {
		$this->customerId = $customerId;
	}

	function getData() {
		$customer = Customer::find($this->customerId);

		if (!$customer) {
			self::redirect("/404");
		}

		return [
			"customer" => $customer,
			"errors" => $this->takeValidationErrors()
		];
	}

}