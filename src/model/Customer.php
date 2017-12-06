<?php

namespace Model;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Valitron\Validator;

/**
 * Class Customer
 *
 * Representa un cliente en la base de datos.
 *
 * @package Model
 */
class Customer extends EloquentModel {

	/**
	 * @return Validator El objeto que comprueba si los datos del cliente
	 * son válidos.
	 */
	public function getValidator() {
		$v = new Validator(
			[
				"dni" => $this->dni,
				"first_name" => $this->first_name,
				"last_names" => $this->last_names,
				"email" => $this->email,
				"birth_date" => $this->birth_date
			]
		);

		$v->rule(
			"required",
			[
				"dni",
				"first_name",
				"last_names",
				"email",
				"birth_date"
			]
		);

		$v->rule("length", "dni", 9);
		$v->rule("email", "email");
		$v->rule("date", "birth_date");

		return $v;
	}

	public function getBills() {
		return Bill::where("customer_id", $this->id)->get();
	}

}

