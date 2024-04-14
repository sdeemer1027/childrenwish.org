<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wish;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;


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

     return view('cart.index',compact('cartitems'));   
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

}
