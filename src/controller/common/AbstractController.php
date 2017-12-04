<?php

namespace Controller;

use Model\Customer;
use Model\User;

/**
 * Class AbstractController
 *
 * El AbstractController es la clase base de todos los controladores, y contiene
 * métodos básicos para la accesibilidad de las rutas.
 *
 * @package Controller
 */
abstract class AbstractController {
	/**
	 * Función que deberá ser implementada por los controladores para
	 * especificar su nivel de accesibilidad.
	 * @return string El nivel de accesibilidad, que puede ser:
	 * 	- public ---------------> la ruta será accesible por todos
	 * 	- authenticated --------> la ruta será accesible solo por usuarios que
	 *                            han iniciado sesión
	 *  - customerOwner:<id> ---> la ruta será accesible por administradores
	 *                            y usuarios que hayan iniciado sesión y sean
	 *                            propietarios del cliente  especificado (p.ej:
	 *                            customerOwner:12)
	 *  - admin ----------------> la ruta solo será accesible por
	 *                            administradores
	 */
	protected abstract function getRouteAccessibility();

	/**
	 * Se asegura de que el usuario que visita la ruta tenga permisos
	 * suficientes para acceder a ella. De lo contrario, lo redirige.
	 */
	protected function enforceAccessibilityRules() {
		$accessibility = $this->getRouteAccessibility();
		$loggedInUser = !empty($_SESSION["loggedInUserId"])
			? User::find($_SESSION["loggedInUserId"])
			: null;
		$matches = [];

		if ($accessibility == "authenticated") {
			if (!$loggedInUser) {
				self::redirect("/login");
			}

		} else if ($accessibility == "admin") {

			if (!$loggedInUser) {
				self::redirect("/login");
			} else if (!$loggedInUser || !$loggedInUser->is_admin) {
				self::redirect("/404");
			}

		} else if (preg_match(
			"/customerOwner:([0-9]+)/",
			$accessibility,
			$matches
		)) {

			$customer = Customer::find($matches[1]);

			if (!$loggedInUser->is_admin &&
				$loggedInUser->id !== $customer->user_id) {
				self::redirect("/404");
			}

		}
	}

	/**
	 * Redirige a un usuario
	 * @param $route string La ruta a donde redirigirlo
	 */
	protected static function redirect($route) {
		header("Location: $route");
		die();
	}
}
