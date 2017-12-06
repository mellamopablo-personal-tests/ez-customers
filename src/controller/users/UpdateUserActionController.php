<?php

namespace Controller;

use Model\User;

/**
 * Class UpdateUserActionController
 *
 * Controlador que se encarga de procesar las peticiones de actualizado de
 * usuarios.
 *
 * @package Controller
 */
class UpdateUserActionController extends ActionController {

	private $userId;

	function getRouteAccessibility() {
		return "userOwner:$this->userId";
	}

	function __construct($userId) {
		$this->userId = $userId;
	}

	function performAction() {
		$user = User::find($this->userId);

		if (!$user) {
			self::redirect("/404");
		}

		$user->name = $_POST["name"];
		$user->email = $_POST["email"];
		$user->is_admin = !empty($_POST["is_admin"]);

		// Evitar que un usuario no admin pueda darse permisos de admin
		$loggedInUser = User::find($_SESSION["loggedInUserId"]);
		if (!$loggedInUser->is_admin && $user->is_admin) {
			$_SESSION["validationErrors"] = [
				[
					"¡No puedes darte permisos de administrador a tí mismo!"
				]
			];

			self::redirect("/users/$user->id");
		}

		$v = $user->getValidator();

		if ($v->validate()) {

			$user->save();

		} else {

			$_SESSION["validationErrors"] = $v->errors();

		}

		self::redirect("/users/$user->id");
	}

}