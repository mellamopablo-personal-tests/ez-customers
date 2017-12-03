<?php

namespace Controller;

use Model\Customer;

class MainController extends AbstractController {

	function getTemplateName() {
		return "main";
	}

	function getData() {
		return ["customers" => Customer::all()];
	}

}