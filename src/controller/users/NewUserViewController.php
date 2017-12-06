<?php

namespace Controller;

/**
 * Class NewUserViewController
 *
 * Controlador que se encarga de renderizar la vista de creación de usuarios.
 *
 * @package Controller
 */
class NewUserViewController extends ViewController {

	function getTemplateName() {
		return "newUser";
	}

	function getRouteAccessibility() {
		return "admin";
	}

	function getData() {
		return [
			"errors" => $this->takeValidationErrors()
		];
	}

}
