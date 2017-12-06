<?php

namespace Controller;

/**
 * Class LoginViewController
 *
 * Controlador que se encarga de renderizar la vista de login.
 *
 * @package Controller
 */
class LoginViewController extends ViewController {

	function getTemplateName() {
		return "login";
	}

	function getRouteAccessibility() {
		return "public";
	}

	function getData() {
		if (empty($_SESSION["loggedInUserId"])) {
			return ["loginFailed" => isset($_GET["loginFailed"])];
		} else {
			self::redirect("/customers");
		}
	}

}