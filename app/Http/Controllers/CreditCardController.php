<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use App\Models\User;




class CreditCardController extends Controller
{
    




public function checkCreditCard(Request $request)
    {
        // Retrieve the logged-in user
        $user = $request->user();




        // Check if the user has a Stripe customer ID
        if ($user->stripe_id) {
            // Initialize Stripe with your API key
            Stripe::setApiKey(config('services.stripe.secret'));

            // Retrieve the customer's details from Stripe
            $customer = \Stripe\Customer::retrieve($user->stripe_id);
//dd($customer);
            // Check if the customer has a default payment method (credit card)
            if ($customer->invoice_settings->default_payment_method) {
                // Customer has a default payment method
                $card = \Stripe\PaymentMethod::retrieve($customer->invoice_settings->default_payment_method);

                return view('credit-card.check', ['card' => $card , 'customer' => $customer]);
            }else{
             //   dd($customer);
            }




        }else{


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
return ;
        }







        // No credit card on file
        return view('credit-card.none');
    }






}
