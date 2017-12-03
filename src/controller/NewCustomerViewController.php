<?php

namespace Controller;

use Model\User;

class NewCustomerViewController extends ViewController {

	function getTemplateName() {
		return "newCustomer";
	}

	function getRouteAccessibility() {
		return "authenticated";
	}

	function getData() {
		return [
			"user" => User::find($_SESSION["loggedInUserId"])
		];
	}

}