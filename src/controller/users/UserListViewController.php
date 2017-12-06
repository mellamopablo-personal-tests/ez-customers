<?php

namespace Controller;

use Model\User;

/**
 * Class UserListViewController
 *
 * Controlador que se encarga de renderizar la vista de la lista de usuarios.
 *
 * @package Controller
 */
class UserListViewController extends ViewController {

	function getTemplateName() {
		return "userList";
	}

	function getRouteAccessibility() {
		return "admin";
	}

	function getData() {
		return [
			"users" => User::all()
		];
	}

}