<?php

namespace Controller;

use Model\User;

class UserViewController extends ViewController {

	private $userId;

	function getTemplateName() {
		return "user";
	}

	function getRouteAccessibility() {
		return "admin";
	}

	function __construct($userId) {
		$this->userId = $userId;
	}

	function getData() {
		$user = User::find($this->userId);

		if (!$user) {
			self::redirect("/404");
		}

		return [
			"user" => $user,
			"errors" => $this->takeValidationErrors()
		];
	}

}