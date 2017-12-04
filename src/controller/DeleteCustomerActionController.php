<?php

namespace Controller;

use Model\Customer;

class DeleteCustomerActionController extends ActionController {

	private $customerId;

	function getRouteAccessibility() {
		return "authenticated";
	}

	function __construct($customerId) {
		$this->customerId = $customerId;
	}

	function performAction() {
		$customer = Customer::find($this->customerId);

		if (!$customer) {
			self::redirect("/404");
		}

		$customer->delete();

		self::redirect("/customers");
	}

}