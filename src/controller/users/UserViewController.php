<?php

namespace Controller;

use Model\User;

/**
 * Class UserViewController
 *
 * Controlador que se encarga de renderizar la vista de un usuario.
 *
 * @package Controller
 */
class UserViewController extends ViewController {

	private $userId;

	function getTemplateName() {
		return "user";
	}

	function getRouteAccessibility() {
		return "userOwner:$this->userId";
	}

	function __construct($userId) {
		$this->userId = $userId;
	}

	function getData() {
		$user = User::find($this->userId);
		$loggedInUser = User::find($_SESSION["loggedInUserId"]);

		if (!$user) {
			self::redirect("/404");
		}

		return [
			"user" => $user,
			"loggedInUser" => $loggedInUser,
			"errors" => $this->takeValidationErrors()
		];
	}

}