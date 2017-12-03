<?php

namespace Controller;

class LoginViewController extends ViewController {

	function getTemplateName() {
		return "login";
	}

	function getRouteAccessibility() {
		return "public";
	}

	function getData() {
		if (empty($_SESSION["loggedInUserId"])) {
			return ["loginFailed" => isset($_GET["loginFailed"])];
		} else {
			self::redirect("/customers");
		}
	}

}