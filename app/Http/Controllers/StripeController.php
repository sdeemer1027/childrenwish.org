<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Exception\CardException;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;



class StripeController extends Controller
{
    //


public function addCard(Request $request){

// Get the token from the request
    $token = $request->input('token');
    $customerId = $request->input('customerId');

//dd($request);

    // Set your Stripe API key
    Stripe::setApiKey(env('STRIPE_SECRET'));

    try {
        // Create a new Stripe customer and attach the card using the token

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


}




// createCheckoutSession
public function createCheckoutSession(Request $request)
    { 
 
        // Initialize Stripe with your secret key
            Stripe::setApiKey(env('STRIPE_SECRET'));
        // Assuming you receive cart items and total amount from the request
        $cartItems = $request->input('cartItems', []); // Default to empty array if not provided
        $totalAmount = $request->input('totalAmount', 0); // Default to 0 if not provided


        try {           
            // Create a Checkout session with Stripe
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [      
                   'price_data' => [
                   'currency' => 'usd',
                   'unit_amount' => 1000, // Amount in cents (e.g., $10.00 = 1000 cents)
                   'product_data' => [
                      'name' => 'Product Name', // Name of the product
                // You can include additional product data here
                      ],
                    ],
                'quantity' => 1, // Quantity of this item     
                ],
                // $cartItems, // Provide valid Stripe line items
                'mode' => 'payment',
                'success_url' => route('checkout.success'), // Redirect URL after successful payment
                'cancel_url' => route('checkout.cancel'), // Redirect URL if payment is canceled
                'payment_intent_data' => [
                    'amount_total' => 1000, // Total amount in cents
                    'currency' => 'usd', // Adjust currency if needed
                    'description' => 'Payment for cart items',
                ],
            ]);

            return response()->json(['sessionId' => $session->id]);
        } catch (ApiErrorException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


public function checkoutSuccess(Request $request)
{
    // Process successful payment, update orders, etc.
    return view('checkout.success');
}

public function checkoutCancel(Request $request)
{
    // Handle canceled payment
    return view('checkout.cancel');
}











}
