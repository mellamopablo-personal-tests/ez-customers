<?php

namespace Controller;

use Carbon\Carbon;
use Model\Customer;

/**
 * Class NewCustomerActionController
 *
 * Controlador que se encarga de procesar las peticiones de creación de clientes
 *
 * @package Controller
 */
class NewCustomerActionController extends ActionController {

	function getRouteAccessibility() {
		return "authenticated";
	}

	function performAction() {
		$customer = new Customer;

		$customer->dni = $_POST["dni"];
		$customer->first_name = $_POST["first_name"];
		$customer->last_names = $_POST["last_names"];
		$customer->email = $_POST["email"];
		$customer->birth_date = Carbon::createFromFormat(
			"Y-m-d",
			$_POST["birth_date"]
		);
		$customer->user_id = $_SESSION["loggedInUserId"];

		$v = $customer->getValidator();

		if ($v->validate()) {

			$customer->save();

			self::redirect("/customers/$customer->id");

		} else {

			$_SESSION["validationErrors"] = $v->errors();
			self::redirect("/customers/new");

		}
	}

}