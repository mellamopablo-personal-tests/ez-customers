<?php

namespace Controller;

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
