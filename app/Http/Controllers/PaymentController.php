<?php

namespace App\Http\Controllers;

use Payrexx\Models\Request\Gateway;
// Include necessary classes from the Payrexx SDK
use Payrexx\Payrexx;
use Payrexx\PayrexxException;

class PaymentController extends Controller
{
    public function createPaymentForm()
    {

        // Replace 'YOUR_INSTANCE_NAME' and 'YOUR_SECRET' with your actual instance name and secret
        $instanceName = 'https://adriansasu.zahls.ch';
        $secret = '6rIF7j6kJgYixrV7QPlFfdmq33WZZ9';

        $payrexx = new Payrexx($instanceName, $secret);

        $gateway = new Gateway();

        // Set up gateway parameters as per your requirements
        $gateway->setAmount(100 * 100); // Amount multiplied by 100
        $gateway->setVatRate(7.70);
        $gateway->setCurrency('CHF');
        // Set other parameters as needed

        try {
            $response = $payrexx->create($gateway);
            $paymentUrl = $response->getLink();
            dd($paymentUrl);

            return view('cart', compact('paymentUrl'));
        } catch (PayrexxException $e) {
            // Handle exception
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
