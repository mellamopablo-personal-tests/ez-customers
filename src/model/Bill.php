<?php

namespace Model;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Valitron\Validator;

class Bill extends EloquentModel {

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
