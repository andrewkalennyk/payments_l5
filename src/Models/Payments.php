<?php

namespace Vis\Payments;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model {

	protected $payment = '';

	public function __construct($type,$data) {

		/*parent::__construct($type,$data);*/

		if (!$type) {
			throw new Exception('Payment type is not defined!');
		}

		switch ($type) {
			case 'paymaster':
				$this->payment = new PaymasterPayment($data);
				break;

			default:
				throw new Exception('Payment type is not defined!');
		}

		return true;
	}

	public function init() {
		
		$order = $this->payment->initPayment();

		if ($order) {
			return $this->payment;
		} else {
			return false;
		}
	}

	public function check() {
		$order = $this->payment->checkPayment();
	}

}