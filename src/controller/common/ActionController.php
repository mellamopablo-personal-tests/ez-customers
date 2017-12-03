<?php

namespace Controller;

/**
 * Class ActionController
 *
 * Un ActionController es un controlador que realiza una acción determinada,
 * pero no renderiza una vista. Normalmente los ActionControllers
 * redireccionarán a otra ruta tras haber realizado su acción.
 *
 * @package Controller
 */
abstract class ActionController extends AbstractController {
	/**
	 * Realiza la acción.
	 */
	protected abstract function performAction();

	/**
	 * Configura el controlador y realiza la acción.
	 */
	function configure() {
		$this->enforceAccessibilityRules();
		$this->performAction();
	}
}
