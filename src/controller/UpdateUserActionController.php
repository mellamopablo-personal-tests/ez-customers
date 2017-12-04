<?php

namespace Controller;

use Carbon\Carbon;
use Model\User;

class UpdateUserActionController extends ActionController {

	private $userId;

	function getRouteAccessibility() {
		return "admin";
	}

	function __construct($userId) {
		$this->userId = $userId;
	}

	function performAction() {
		$user = User::find($this->userId);

		if (!$user) {
			self::redirect("/404");
		}

		$user->name = $_POST["name"];
		$user->email = $_POST["email"];
		$user->is_admin = !empty($_POST["is_admin"]);

		$v = $user->getValidator();

		if ($v->validate()) {

			$user->save();

		} else {

			$_SESSION["validationErrors"] = $v->errors();

		}

		self::redirect("/users/$user->id");
	}

}