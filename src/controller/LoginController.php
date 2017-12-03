<?php

namespace Controller;

use Model\User;

class LoginController extends AbstractController {

	function getTemplateName() {
		return null;
	}

	function getData() {
		return null;
	}

	private function failLogin() {
		self::redirect("/?loginFailed");
	}

	function handleLogin() {
		$username = $_POST["username"];
		$password = $_POST["password"];

		if (empty($username)) {
			return $this->failLogin();
		}

		$user = User::where("name", $username)->get()->first();

		if (!$user) {
			return $this->failLogin();
		}

		if (md5($password) === $user->password) {
			$_SESSION["loggedInUserId"] = $user->id;
			self::redirect("/");
		} else {
			$this->failLogin();
		}
	}

}