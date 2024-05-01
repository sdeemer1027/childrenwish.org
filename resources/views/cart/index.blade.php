@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Your Shopping Cart</div>

                <div class="card-body">
            @php
$total = 0; // Initialize the total variable
@endphp       

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">wishID</th>
      <th scope="col">Wish For</th>
      <th scope="col">Quanity</th>
      <th scope="col">Cost</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($cartitems as $cartitem)
    <tr>
      <th scope="row"></th>
      <td>{{$cartitem->wish->name}}</td>      
      <td>{{$cartitem->wish->child->name}}</td>
      <td>{{$cartitem->quantity}}</td>
      <td>{{$cartitem->wish->value}}</td>
    </tr>
    @endforeach
    @foreach($cartitems as $cartitem)
    @php
    $total += $cartitem->wish->value; // Add each wish value to the total
    @endphp
    {{--$cartitem->wish->value--}} {{-- Display individual wish value --}}
@endforeach

 

    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td>Grand Total:</td>
      <td>{{$total}} {{-- Display the grand total --}}</td>
    </tr>
  </tbody>
</table>

<form id="addCardForm">
    @csrf
    @method('post')
    <div id="cardElement"></div>
    <button id="addCardButton">Add Card</button>
    <!-- Add the checkout button -->
    <button id="checkoutButton">Checkout</button>
</form>

{{--$cartitems--}}







{{-- --}}

                   <!-- Display saved cards if available -->
                    @if($hasSavedCards)
                        <h3>Your Saved Cards:</h3>
                        <ul>
                            @if($hasDefaultSource)
                        <h3>Your Default Payment Source:</h3>
                        <p>
                            Default Card ending in ****{{ $defaultSource }} (or display relevant card information)
                            <button onclick="useDefaultSource()">Use this card</button>
                        </p>
                    @endif
                        </ul>
                    @endif
                    <!-- Cart items display and checkout button -->


{{--
--}}






                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function selectSavedCard(cardId) {
        // Set the selected card ID in a hidden form field or JavaScript variable
        // Proceed with checkout using the selected card
    }
</script>


<script>








// JavaScript code

// Event listener for the checkout button
document.getElementById('checkoutButton').addEventListener('click', function(event) {
    event.preventDefault();

     // Prepare data to send in the AJAX request
    const cartItems = [
                 
          ]; // Assuming 'donation' is a valid cart item
    const totalAmount = 1000; // Example: $10.00 in cents (1000 cents)



    // Perform the AJAX request to create the checkout session
//    axios.post('/create-checkout-session', {
//        cartItems: cartItems,
//        totalAmount: totalAmount,
//    }).then(response => {
        // Redirect to the checkout page using the session ID
//        window.location.href = `https://checkout.stripe.com/pay/${response.data.sessionId}`;
//    }).catch(error => {
//        console.error(error.response.data.error);
        // Handle error
//    });
});




</script>



@endsection
