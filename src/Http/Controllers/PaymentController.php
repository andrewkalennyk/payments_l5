<?php namespace Vis\Payments\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;

class PaymentController extends Controller
{
	public function showPaymentRedirect($type)
	{
		if ($type == 'paymaster') {

			$params = session('payment');

			return view('payments::paymaster', compact("params"));
		} else {
			// todo:
		}

	}

}