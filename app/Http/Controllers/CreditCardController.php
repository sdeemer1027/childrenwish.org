<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;




class CreditCardController extends Controller
{
    




public function checkCreditCard(Request $request)
    {


 if (!Auth::check()) {
            // Redirect to the login page
            return redirect()->route('login')->with('error', 'Please log in to add items to your cart.');
        }




        // Retrieve the logged-in user
        $user = $request->user();

        // Check if the user has a Stripe customer ID
        if ($user->stripe_id) {
            // Initialize Stripe with your API key
            Stripe::setApiKey(config('services.stripe.secret'));

            // Retrieve the customer's details from Stripe
            $customer = \Stripe\Customer::retrieve($user->stripe_id);
            // Check if the customer has a default payment method (credit card)
            //dd($customer);


            if ($customer->invoice_settings->default_payment_method) {
                // Customer has a default payment method
                $card = \Stripe\PaymentMethod::retrieve($customer->invoice_settings->default_payment_method);
            // you have an account and a default card
                return view('credit-card.founddefault', ['card' => $card , 'customer' => $customer]);
            
            }elseif ($customer->default_source) {
                // Customer has a default payment method
                $paymentMethods = \Stripe\PaymentMethod::all([
                //$stripe->paymentMethods->all([
                'customer' => $customer, // Replace with the actual customer ID
                'type' => 'card',
            ]);

                $card = \Stripe\PaymentMethod::retrieve($customer->default_source);
            // you have an account and a default card
                return view('credit-card.founddefault', ['card' => $card , 'customer' => $customer, 'paymentMethods' => $paymentMethods]);
            
            }

            else{
            // you have an account and no default card on file
//                return view('credit-card.check', [ 'customer' => $customer]);



 // Fetch the Stripe account details
            $account = \Stripe\Customer::retrieve($user->stripe_id);

            // Pass the account data to the view
            return view('credit-card.check', ['account' => $account,'customer' => $customer]);


              //  dd($customer);
            }




        }else{
// you have no account so we will create it

// Set your Stripe API key
Stripe::setApiKey(config('services.stripe.secret'));

// Create a customer in Stripe
$stripeCustomer = Customer::create([
    'email' => $user->email, // Customer's email
    'name' => $user->name, // Customer's email
]);

// Retrieve the Stripe Customer ID
$stripeCustomerId = $stripeCustomer->id;

// Store $stripeCustomerId in your database for future reference

$user = User::find($user->id);
$user->stripe_id = $stripeCustomerId; // Assign the Stripe user ID
//$user->stripe_token = $stripeToken; // Assign the Stripe token
$user->save();


//dd($stripeCustomerId);
return view('credit-card.none');
        }







        // No credit card on file
        return view('credit-card.none');
    }






}
