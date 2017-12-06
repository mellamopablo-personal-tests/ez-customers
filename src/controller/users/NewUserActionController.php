<?php

namespace Controller;

use Model\User;

/**
 * Class NewUserActionController
 *
 * Controlador que se encarga de procesar las peticiones de creación de usuarios
 *
 * @package Controller
 */
class NewUserActionController extends ActionController {

	function getRouteAccessibility() {
		return "admin";
	}

	function performAction() {
		$user = new User;

		$user->name = $_POST["name"];
		$user->password = $_POST["password"];
		$user->email = $_POST["email"];
		$user->is_admin = (!empty($_POST["is_admin"]));

		$v = $user->getValidator();

		if ($v->validate()) {

			// Perdonadme, dioses de la seguridad, por este pecado capital
			$user->password = md5($user->password);

			$user->save();

			self::redirect("/users/$user->id");

		} else {

			$_SESSION["validationErrors"] = $v->errors();
			self::redirect("/users/new");

		}
	}

}