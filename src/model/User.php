<?php

namespace Model;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Valitron\Validator;

class User extends EloquentModel {

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
