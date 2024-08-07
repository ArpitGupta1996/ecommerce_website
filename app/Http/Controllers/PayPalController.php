<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function createtransaction()
    {
        return view('paypal.transaction');
    }


    public function processTransaction(Request $request)
    {
        $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));

        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "INR",
                        "value" => "1"
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()->route('createTransaction')->with('error', $response['message'] ?? 'Something went wrong');
        }
    }


    public function successTransaction(Request $request){
        $provider = new PayPalClient();

        $provider->setApiCredentials(config('paypal'));

        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request['token']);

        if(isset($response['status']) && $response['status'] == 'COMPLETED'){
            return redirect()->route('createTransaction')->with('error', $response['message'] ?? 'Something went wrong');
        }
    }

    public function cancelTransaction(Request $request){
        return redirect()->route('createTransaction')->with('error', $response['message'] ?? 'You have cancelled the transaction');
    }
}
