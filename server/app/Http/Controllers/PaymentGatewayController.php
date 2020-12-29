<?php

namespace App\Http\Controllers;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use Illuminate\Http\Request;

class PaymentGatewayController extends Controller
{
    public function pay() {

        $payment = PaytmWallet::with('receive');

        $payment->prepare([
            'order' => 23, // your order id taken from cart
            'user' => 'Cust_id_12', // your user id
            'mobile_number' => 7277407765, // your customer mobile no
            'email' => 'hungerforcode@gmail.com', // your user email address
            'amount' => 20.00, // amount will be paid in INR.
            'callback_url' => 'http://localhost:8000/paytm/public/payment/status' // callback URL
        ]);

        return $payment->receive();
    }

    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');

        $response = $transaction->response(); // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm

        if($transaction->isSuccessful()){



        }else if($transaction->isFailed()){


            //Transaction Failed
        }else if($transaction->isOpen()){


            //Transaction Open/Processing
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id

        $transaction->getTransactionId(); // Get transaction id
    }

}
