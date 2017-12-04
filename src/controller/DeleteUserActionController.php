<?php

namespace Controller;

use Model\Customer;
use Model\User;

class DeleteUserActionController extends ActionController {

	private $userId;

	function getRouteAccessibility() {
		return "admin";
	}

	function __construct($userId) {
		$this->userId = $userId;
	}

	function performAction() {
		$user = User::find($this->userId);

		if (User::count() === 1) {
			$_SESSION["validationErrors"] = [
				[
					"No se puede borrar el último usuario de la base de datos"
				]
			];

			self::redirect("/users/$user->id");
		}

		$user->delete();

		self::redirect("/users");
	}

}