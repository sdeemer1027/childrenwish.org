<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wish;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Exception\CardException;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;

class CartController extends Controller
{
    //

    public function index(){
         if (!Auth::check()) {
            // Redirect to the login page
            return redirect()->route('login')->with('error', 'Please log in to add items to your cart.');
        }
$user = Auth::user();   















$cartitems = CartItem::where('user_id',$user->id)->with('wish','wish.child')->get();





 // Get the logged-in user's ID
        $userId = Auth::id();
//dd($userId);

      // Initialize Stripe with your secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Retrieve the Stripe customer ID associated with the user
            $user = User::find($userId);
            $stripeCustomerId = $user->stripe_id;

            if ($stripeCustomerId) {
                // Fetch the customer's information from Stripe, including saved cards
                $customer = Customer::retrieve($stripeCustomerId);

//dd($customer);

                // Check if the customer has saved cards
                $hasSavedCards = !empty($customer->default_source);
                $savedCards = $customer->default_source; // Array of saved cards
 // Check if the customer has a default payment source
                $hasDefaultSource = isset($customer->default_source);
 $defaultSource = $customer->default_source;


                return view('cart', [
                    'hasSavedCards' => $hasSavedCards,
                    'savedCards' => $savedCards,
                ]);
            }
        } catch (\Exception $e) {
            // Handle Stripe API errors
            // Log the error or show an error message to the user
        }


     return view('cart.index',compact('cartitems','hasSavedCards','savedCards','hasDefaultSource','defaultSource'));   
    }



    public function add(Request $request){ 
        //$wish){
 $user = Auth::user();   
//dd($user);
foreach ($request->query as $key => $value) {
    // code...
}
$wish = Wish::findOrFail($key);

//cart_items
CartItem::create(['user_id'=>$user->id,'wish_id'=>$wish->id,'quantity'=>1]);
//$update =Wish::update(['fulfilled'=>1])->where('id',$wish->id);
 // Update the wish status to fulfilled
    $wish->update(['fulfilled' => 1]); //->where('id',$wish->id);
    
 //dd($request->query,$key,$value);
         return redirect()->back()->with('success', 'Wish added to cart successfully!');
  //   return view('cart.index',compact('wish'));   
    }

    public function addToCart($wishId)
{
    // Find the wish by ID
    $wish = Wish::findOrFail($wishId);

    // Add the wish to the cart (implement your cart logic here)

    // Redirect back or to the cart page
    return redirect()->back()->with('success', 'Wish added to cart successfully!');
}


public function showCart()
    {
        // Get the logged-in user's ID
        $userId = Auth::id();

        // Initialize Stripe with your secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Retrieve the Stripe customer ID associated with the user
            $user = User::find($userId);
            $stripeCustomerId = $user->stripe_customer_id;

            if ($stripeCustomerId) {
                // Fetch the customer's information from Stripe, including saved cards
                $customer = Customer::retrieve($stripeCustomerId);

                // Check if the customer has saved cards
                $hasSavedCards = !empty($customer->sources->data);
                $savedCards = $customer->sources->data; // Array of saved cards

                return view('cart', [
                    'hasSavedCards' => $hasSavedCards,
                    'savedCards' => $savedCards,
                ]);
            }
        } catch (\Exception $e) {
            // Handle Stripe API errors
            // Log the error or show an error message to the user
        }

        // If no saved cards or Stripe customer ID, proceed with regular cart display
        return view('cart');
    }








}
