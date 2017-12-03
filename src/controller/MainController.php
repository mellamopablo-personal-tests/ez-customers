<?php

namespace Controller;

use Model\Customer;

class MainController extends AbstractController {

	function getTemplateName() {
		return empty($_SESSION["loggedInUserId"]) ? "login" : "main";
	}

	function getData() {
		if (empty($_SESSION["loggedInUserId"])) {
			return ["loginFailed" => isset($_GET["loginFailed"])];
		} else {
			return ["customers" => Customer::all()];
		}
	}

}