<?php

namespace Controller;

use Model\Customer;

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