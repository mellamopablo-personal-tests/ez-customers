<?php

namespace Controller;

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