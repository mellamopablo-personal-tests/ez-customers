<?php

namespace Controller;

use Twig_Environment;
use Twig_Loader_Filesystem;

abstract class AbstractController {
	protected abstract function getTemplateName();

	protected abstract function getData();

	function render() {
		$data = $this->getData();
		$template = $this->getTemplateName();
		$loader = new Twig_Loader_Filesystem("src/views");
		$twig = new Twig_Environment($loader);

		return $twig->render("$template.twig", $data);
	}

	protected static function redirect($route) {
		header("Location: $route");
		die();
	}
}
