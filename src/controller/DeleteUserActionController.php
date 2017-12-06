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

		if (User::where("is_admin", true)->count() === 1 && $user->is_admin) {
			$_SESSION["validationErrors"] = [
				[
					"No se puede borrar el último administrador de la base de datos"
				]
			];

			self::redirect("/users/$user->id");
		}

		$user->delete();

		self::redirect("/users");
	}

}