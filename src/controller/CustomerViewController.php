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
		$user = User::find($_SESSION["loggedInUserId"]);

		$userCanSeeCustomer = $user->is_admin
			|| $customer->user_id === $user->id;

		if (!$customer || !$userCanSeeCustomer) {
			self::redirect("/404");
		}

		return [
			"customer" => $customer,
			"user" => $user,
			"errors" => $this->takeValidationErrors()
		];
	}

}