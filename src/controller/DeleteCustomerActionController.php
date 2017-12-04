<?php

namespace Controller;

use Model\Customer;
use Model\User;

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
		$user = User::find($_SESSION["loggedInUserId"]);

		$userCanEditCustomer = $user->is_admin
			|| $customer->user_id === $user->id;

		if (!$customer || !$userCanEditCustomer) {
			self::redirect("/404");
		}

		$customer->delete();

		self::redirect("/customers");
	}

}