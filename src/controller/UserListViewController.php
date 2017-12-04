<?php

namespace Controller;

use Model\User;

class UserListViewController extends ViewController {

	function getTemplateName() {
		return "userList";
	}

	function getRouteAccessibility() {
		return "admin";
	}

	function getData() {
		return [
			"users" => User::all()
		];
	}

}