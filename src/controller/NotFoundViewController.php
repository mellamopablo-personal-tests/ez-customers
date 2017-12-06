<?php

namespace Controller;

/**
 * Class NotFoundViewController
 *
 * Controlador que se encarga de responder a las peticiones que necesitan una
 * respuesta 404 No Encontrado.
 *
 * @package Controller
 */
class NotFoundViewController extends ViewController {

	function getTemplateName() {
		return "404";
	}

	function getRouteAccessibility() {
		return "public";
	}

	function getData() {
		return [];
	}

}