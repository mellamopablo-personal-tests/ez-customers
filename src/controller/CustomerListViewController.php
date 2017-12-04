<?php

namespace Controller;

use Model\Customer;
use Model\User;

class CustomerListViewController extends ViewController {

	function getTemplateName() {
		return "customerList";
	}

	function getRouteAccessibility() {
		return "authenticated";
	}

	function getData() {
		return [
			"customers" => Customer::all(),
			"user" => User::find($_SESSION["loggedInUserId"])
		];
	}

}