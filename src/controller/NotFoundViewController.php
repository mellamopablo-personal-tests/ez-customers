<?php

namespace Controller;

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