<?php

namespace Controller;

use Carbon\Carbon;
use Model\Customer;

class UpdateCustomerActionController extends ActionController {

	private $customerId;

	function getRouteAccessibility() {
		return "authenticated";
	}

	function __construct($customerId) {
		$this->customerId = $customerId;
	}

	function performAction() {
		$dni = $_POST["dni"];
		$first_name = $_POST["first_name"];
		$last_names = $_POST["last_names"];
		$email = $_POST["email"];
		$birth_date = $_POST["birth_date"];

		$customer = Customer::find($this->customerId);

		if (!$customer) {
			self::redirect("/404");
		}

		$customer->dni = $dni;
		$customer->first_name = $first_name;
		$customer->last_names = $last_names;
		$customer->email = $email;
		$customer->birth_date = Carbon::createFromFormat("Y-m-d", $birth_date);

		$v = $customer->getValidator();

		if ($v->validate()) {

			$customer->save();

		} else {

			$_SESSION["validationErrors"] = $v->errors();

		}

		self::redirect("/customers/$customer->id");
	}

}