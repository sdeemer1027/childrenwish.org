<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Exception\CardException;

class StripeController extends Controller
{
    //


public function addCard(Request $request){


//dd($request);

// Get the token from the request
    $token = $request->input('token');
$customerId = $request->input('customerId');


    // Set your Stripe API key
    Stripe::setApiKey(env('STRIPE_SECRET'));

    try {
        // Create a new Stripe customer and attach the card using the token
//        $customer = Customer::create([
//            'source' => $token,
//        ]);

$customer = Customer::update(
            $customerId,
            ['source' => $token]
        );

        // Optionally, you can save the customer ID to your database
        // $customerId = $customer->id;

        return response()->json(['success' => true]);
    } catch (CardException $e) {
        // Handle card error, if any
        return response()->json(['error' => $e->getMessage()], 400);
    } catch (\Exception $e) {
        // Handle other errors
        return response()->json(['error' => 'An error occurred while adding the card.'], 500);
    }


//return ;

}

}
