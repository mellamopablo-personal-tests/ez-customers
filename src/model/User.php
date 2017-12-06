<?php

namespace Model;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Valitron\Validator;

/**
 * Class User
 *
 * Representa un usuario en la base de datos.
 *
 * @package Model
 */
class User extends EloquentModel {

	/**
	 * @return Validator El objeto que comprueba si los datos del usuario
	 * son válidos.
	 */
	public function getValidator() {
		$v = new Validator(
			[
				"name" => $this->name,
				"password" => $this->password,
				"email" => $this->email,
				"is_admin" => $this->is_admin
			]
		);

		$v->rule(
			"required",
			[
				"name",
				"password",
				"email"
			]
		);

		$v->rule("lengthMax", "name", 32);

		return $v;
	}

}
