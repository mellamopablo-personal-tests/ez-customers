<?php

namespace Controller;

use Carbon\Carbon;
use Model\Customer;

class UpdateCustomerActionController extends ActionController {

	private $customerId;

	function getRouteAccessibility() {
		return "customerOwner:$this->customerId";
	}

	function __construct($customerId) {
		$this->customerId = $customerId;
	}

	function performAction() {
		$customer = Customer::find($this->customerId);

		if (!$customer) {
			self::redirect("/404");
		}

		$customer->dni = $_POST["dni"];
		$customer->first_name = $_POST["first_name"];
		$customer->last_names = $_POST["last_names"];
		$customer->email = $_POST["email"];
		$customer->birth_date = Carbon::createFromFormat(
			"Y-m-d",
			$_POST["birth_date"]
		);

		$v = $customer->getValidator();

		if ($v->validate()) {

			$customer->save();

		} else {

			$_SESSION["validationErrors"] = $v->errors();

		}

		self::redirect("/customers/$customer->id");
	}

}