@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Your Shopping Cart</div>

                <div class="card-body">
                   

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
      <th scope="row">{{$cartitem->id}}</th>
      <td>{{$cartitem->wish_id}} {{$cartitem->wish->name}}</td>
      
      <td>{{$cartitem->wish->child->name}}</td>
      <td>{{$cartitem->quantity}}</td>
      <td>{{$cartitem->wish->value}}</td>
    </tr>
    @endforeach
  </tbody>
</table>



{{--$cartitems--}}



                </div>
            </div>
        </div>
    </div>
</div>





@endsection
