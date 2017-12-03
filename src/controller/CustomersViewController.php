<?php

namespace Controller;

use Model\Customer;
use Model\User;

class CustomersViewController extends ViewController {

	function getTemplateName() {
		return "customers";
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