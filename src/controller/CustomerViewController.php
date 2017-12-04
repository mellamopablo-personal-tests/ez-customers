<?php

namespace Controller;

use Model\Customer;
use Model\User;

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