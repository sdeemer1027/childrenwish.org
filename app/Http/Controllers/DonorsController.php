<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Donor;
use App\Models\Donation;
use Stripe\Stripe;
use Stripe\PaymentIntent;


class DonorsController extends Controller
{
    //

public function index()
    {
        // Logic to fetch and display all donors


  $user = Auth::user();
$donations = Donation::with('user')->where('user_id',$user->id)->get();

    $role = $user->getRoleNames()->first();

    return view('donor.index', compact('role','user','donations')); 


    }

    public function create()
    {
        // Show the form to create a new donor
    }

    public function store(Request $request)
    {
        // Logic to store a new donor in the database
    }

    public function show(Donor $donor)
    {
        // Show details of a specific donor
    }

    public function edit(Donor $donor)
    {
        // Show the form to edit a donor's information
    }

    public function update(Request $request, Donor $donor)
    {
        // Logic to update a donor's information
    }

    public function destroy(Donor $donor)
    {
        // Logic to delete a donor from the database
    }






/*

Stripe::setApiKey(env('STRIPE_SECRET'));

$paymentIntent = PaymentIntent::create([
    'amount' => $amount,
    'currency' => 'usd',
]);

*/


}
