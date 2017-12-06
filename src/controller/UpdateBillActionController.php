<?php

namespace Controller;

use Model\Bill;

class UpdateBillActionController extends ActionController {

	private $customerId;
	private $billId;

	function getRouteAccessibility() {
		return "customerOwner:$this->customerId";
	}

	function __construct($customerId, $billId) {
		$this->customerId = $customerId;
		$this->billId = $billId;
	}

	function performAction() {
		$bill = Bill::find($this->billId);

		if (!$bill) {
			self::redirect("/404");
		}

		$bill->concept = $_POST["concept"];
		$bill->notes = $_POST["notes"];
		$bill->amount = $_POST["amount"];
		$bill->paid = !empty($_POST["paid"]);
		$bill->payment_method = $_POST["payment_method"] === ""
			? null
			: $_POST["payment_method"];

		$v = $bill->getValidator();

		if ($v->validate()) {

			$bill->save();

		} else {

			$_SESSION["validationErrors"] = $v->errors();

		}

		self::redirect("/customers/$this->customerId/bills/$bill->id");
	}

}