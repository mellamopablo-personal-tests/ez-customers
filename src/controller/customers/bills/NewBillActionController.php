<?php

namespace Controller;

use Model\Bill;

/**
 * Class NewBillActionController
 *
 * Controlador que se encarga de procesar las peticiones de creación de
 * facturas.
 *
 * @package Controller
 */
class NewBillActionController extends ActionController {

	private $customerId;

	function getRouteAccessibility() {
		return "customerOwner:$this->customerId";
	}

	function __construct($customerId) {
		$this->customerId = $customerId;
	}

	function performAction() {
		$bill = new Bill;

		$bill->concept = $_POST["concept"];
		$bill->notes = $_POST["notes"];
		$bill->amount = $_POST["amount"];
		$bill->paid = !empty($_POST["paid"]);
		$bill->payment_method = $_POST["payment_method"] === ""
			? null
			: $_POST["payment_method"];
		$bill->customer_id = $this->customerId;

		$v = $bill->getValidator();

		if ($v->validate()) {

			$bill->save();

			self::redirect("/customers/$this->customerId/bills/$bill->id");

		} else {

			$_SESSION["validationErrors"] = $v->errors();
			self::redirect("/customers/$this->customerId/bills/new");

		}
	}

}