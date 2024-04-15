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



{{--$cartitems--}}



                </div>
            </div>
        </div>
    </div>
</div>





@endsection
