<?php

namespace Model;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Valitron\Validator;

/**
 * Class Bill
 *
 * Representa una factura de un cliente en la base de datos.
 *
 * @package Model
 */
class Bill extends EloquentModel {

	/**
	 * @return Validator El objeto que comprueba si los datos de la factura
	 * son válidos.
	 */
	public function getValidator() {


		$v = new Validator(
			[
				"concept" => $this->concept,
				"notes" => $this->notes,
				"amount" => $this->amount,
				"paid" => $this->paid,
				"payment_method" => $this->payment_method
			]
		);

		$v->rule(
			"required",
			[
				"concept",
				"amount",
				"paid",
			]
		);

		$v->rule("numeric", "amount");

		return $v;
	}

}
