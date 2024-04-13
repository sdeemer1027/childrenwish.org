
@extends('layouts.app')

@section('content')

{{$customer}}
<HR>
{{$card}}

<HR>
<script src="https://js.stripe.com/v3/"></script>



 <form id="addCardForm">
    <div id="cardElement"></div>
    <button id="addCardButton">Add Card</button>
</form>


<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var card = elements.create('card');
    var customerId = '{{ $customer->id }}'; // Assuming you have the customer ID available in your blade template

    card.mount('#cardElement');

    var form = document.getElementById('addCardForm');
    var addCardButton = document.getElementById('addCardButton');

    addCardButton.addEventListener('click', function(event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Display error to the user
                console.error(result.error.message);
            } else {
                // Send the token and customer ID to your server to add the card to Stripe
                var token = result.token.id;
                addCardToStripe(token, customerId);
            }
        });
    });

    function addCardToStripe(token, customerId) {
        fetch('/add-card', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ token: token, customerId: customerId }) // Include the customerId in the request body
        }).then(function(response) {
            if (response.ok) {
                // Card added successfully
                alert('Card added successfully!');
            } else {
                // Display error to the user
                response.json().then(function(data) {
                    console.error(data.error);
                });
            }
        }).catch(function(error) {
            console.error('Error:', error);
        });
    }
</script>


{{$customer->id}}


@endsection
