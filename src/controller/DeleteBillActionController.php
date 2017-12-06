<?php

namespace Controller;

use Model\Bill;

class DeleteBillActionController extends ActionController {

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
		Bill::find($this->billId)->delete();

		self::redirect("/customers/$this->customerId");
	}

}