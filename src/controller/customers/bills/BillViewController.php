<?php

namespace Controller;

use Model\Bill;
use Model\Customer;

/**
 * Class BillViewController
 *
 * Controlador que se encarga de renderizar la vista de facturas.
 *
 * @package Controller
 */
class BillViewController extends ViewController {

	private $customerId;
	private $billId;

	function getTemplateName() {
		return "bill";
	}

	function getRouteAccessibility() {
		return "customerOwner:$this->customerId";
	}

	function __construct($customerId, $billId) {
		$this->customerId = $customerId;
		$this->billId = $billId;
	}

	function getData() {
		$customer = Customer::find($this->customerId);
		$bill = Bill::find($this->billId);

		return [
			"customer" => $customer,
			"bill" => $bill,
			"errors" => $this->takeValidationErrors()
		];
	}

}