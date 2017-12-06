<?php

namespace Controller;

use Model\Customer;
use Model\User;

/**
 * Class CustomerListViewController
 *
 * Controlador que se encarga de renderizar la vista de la lista de clientes.
 *
 * @package Controller
 */
class CustomerListViewController extends ViewController {

	function getTemplateName() {
		return "customerList";
	}

	function getRouteAccessibility() {
		return "authenticated";
	}

	function getData() {
		$user = User::find($_SESSION["loggedInUserId"]);
		return [
			"customers" => $user->is_admin
				? Customer::all()
				: Customer::where("user_id", $user->id)->get(),
			"user" => $user
		];
	}

}