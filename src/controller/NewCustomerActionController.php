<?php

namespace Controller;

use Carbon\Carbon;
use Model\Customer;

class NewCustomerActionController extends ActionController {

	function getRouteAccessibility() {
		return "authenticated";
	}

	function performAction() {
		$dni = $_POST["dni"];
		$first_name = $_POST["first_name"];
		$last_names = $_POST["last_names"];
		$email = $_POST["email"];
		$birth_date = $_POST["birth_date"];

		$customer = new Customer;

		// TODO validar datos

		$customer->dni = $dni;
		$customer->first_name = $first_name;
		$customer->last_names = $last_names;
		$customer->email = $email;
		$customer->birth_date = Carbon::createFromFormat("Y-m-d", $birth_date);
		$customer->user_id = $_SESSION["loggedInUserId"];

		$customer->save();

		self::redirect("/customers/$customer->id");
	}

}