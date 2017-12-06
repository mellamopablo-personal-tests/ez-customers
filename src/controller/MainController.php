<?php

namespace Controller;

/**
 * Class MainController
 *
 * El controlador principal. Se encarga de procesar las peticiones a la
 * raíz de la página, y de redirigir a /login si el usuario no ha iniciado
 * sesión, o de redirigir a /customers en caso contrario.
 *
 * @package Controller
 */
class MainController extends ActionController {

	function getRouteAccessibility() {
		return "public";
	}

	function performAction() {
		if (empty($_SESSION["loggedInUserId"])) {
			self::redirect("/login");
		} else {
			self::redirect("/customers");
		}
	}

}