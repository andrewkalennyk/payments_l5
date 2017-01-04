<?php

namespace Vis\Payments;

use Illuminate\Database\Eloquent\Model;
use Vis\Payments\PaymasterPayment;

class Payments extends Model {

	protected $payment = '';

	public function __construct($type,$data) {
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

}