@extends('layouts.app')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">No credit Card on file</div>

                <div class="card-body">                    
                   
                      <BR><BR>
                    
                    <div class="row justify-content-center">

             
                    <div class="card col-md-12">
                     <div class="card-header"><span style="float: right;"><i class="fa fa-eye" aria-hidden="true"></i></span></div>
                      <div class="card-body">

  <form id="addCardForm">
    <div id="cardElement"></div>
    <button id="addCardButton">Add Card</button>
</form>
                     </div>

<script>
    var card = elements.create('card');
    card.mount('#cardElement');
</script>

<script>
    var form = document.getElementById('addCardForm');
    var addCardButton = document.getElementById('addCardButton');

    addCardButton.addEventListener('click', function(event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Display error to the user
                console.error(result.error.message);
            } else {
                // Send the token to your server to add the card to Stripe
                var token = result.token.id;
                addCardToStripe(token);
            }
        });
    });

    function addCardToStripe(token) {
        fetch('/add-card', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ token: token })
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

                    </div>


<BR><BR><BR>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
