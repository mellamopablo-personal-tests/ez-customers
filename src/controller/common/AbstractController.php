<?php

namespace Controller;

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
	 * 	- public ----------> la ruta será accesible por todos
	 * 	- authenticated ---> la ruta será accesible solo por usuarios que han
	 *                       iniciado sesión
	 *  - admin -----------> la ruta solo será accesible por administradores
	 */
	protected abstract function getRouteAccessibility();

	/**
	 * Se asegura de que el usuario que visita la ruta tenga permisos
	 * suficientes para acceder a ella. De lo contrario, lo redirige.
	 */
	protected function enforceAccessibilityRules() {
		switch ($this->getRouteAccessibility()) {
			case "authenticated":
				if (empty($_SESSION["loggedInUserId"])) {
					self::redirect("/login");
				}
				break;
			case "admin":
				if (empty($_SESSION["loggedInUserId"])) {
					self::redirect("/login");
				}
				$user = User::find($_SESSION["loggedInUserId"]);
				if (!$user || !$user->is_admin) {
					self::redirect("/customers");
				}
				break;
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
