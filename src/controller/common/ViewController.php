<?php

namespace Controller;

use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * Class ViewController
 *
 * Un ViewController es un controlador que está renderiza una vista. Posee
 * métodos para trabajar con plantillas.
 *
 * @package Controller
 */
abstract class ViewController extends AbstractController {
	/**
	 * @return string El nombre de la plantilla a ser renderizada.
	 */
	protected abstract function getTemplateName();

	/**
	 * @return array Los datos a pasar a la plantilla renderizada
	 */
	protected abstract function getData();

	protected abstract function getRouteAccessibility();

	/**
	 * Renderiza la pantilla
	 * @return string El resultado en HTML, listo para ser enviado al cliente.
	 */
	function render() {
		$this->enforceAccessibilityRules();

		$data = $this->getData();
		$template = $this->getTemplateName();
		$loader = new Twig_Loader_Filesystem("src/views");
		$twig = new Twig_Environment($loader);

		return $twig->render("$template.twig", $data);
	}
}
