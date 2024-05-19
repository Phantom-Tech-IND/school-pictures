<?php

namespace App\Http\Controllers;

use Payrexx\Models\Request\Gateway;
use Payrexx\PayrexxException;

class PaymentController extends Controller
{
    public function createPaymentForm()
    {

        // $instanceName = 'adriansasu';
        // $secret = '6rIF7j6kJgYixrV7QPlFfdmq33WZZ9';
        // $apiBaseDomain = 'zahls.ch';

        try {

            $payrexx = new \Payrexx\Payrexx();

            $gateway = new Gateway();

            // Set up gateway parameters as per your requirements
            $gateway->setAmount(100 * 100); // Amount multiplied by 100
            $gateway->setVatRate(7.70);
            $gateway->setCurrency('CHF');
            $response = $payrexx->create($gateway);
            dd($response);
            // Set other parameters as needed
            $paymentUrl = $response->getLink();

            return view('cart', compact('paymentUrl'));
        } catch (PayrexxException $e) {
            // Handle exception
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
