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
		return "authenticated";
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
			"customer" => Customer::find($this->customerId),
			"user" => User::find($_SESSION["loggedInUserId"]),
			"errors" => $this->takeValidationErrors()
		];
	}

}