@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}       
                    <a href="{{ route('addChild') }}" class="btn btn-primary" style="float: right;"> <i class="fa fa-plus-circle"></i>  Child</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


<p>Your role is: {{ $role }}</p>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">age</th>
      <th scope="col">type</th>
      <th scope="col">illness</th>
      <th scope="col">Wishes</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
   
  


@foreach($guardian as $guardi)
@foreach($guardi->children as $child)
  <tr>
      <th scope="row">{{$child->id}}</th>
      <td ><a href="{{ route('editChild', $child->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> {{$child->name}}</td>
      <td>{{$child->age}}</td>
      <td>{{$child->type}}</td>
      <td>{{$child->illness}}</td>
      <td>
        @foreach ($child->wishes as $wish)
            <a href="{{ route('editWish', ['wish_id' => $wish->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>  <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#wishModal{{$wish->id}}"><i class="fa fa-eye" aria-hidden="true"></i></button> {{ $wish->name }}

<!-- Modal -->
<div class="modal fade" id="wishModal{{$wish->id}}" tabindex="-1" aria-labelledby="wishModalLabel{{$wish->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="wishModalLabel{{$wish->id}}">Wish Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Display wish details here -->
                <p>Name: {{$wish->name}}</p>
                <p>Category: {{$wish->category->name}}</p>
                <p>Donation Request: {{$wish->value}}</p>
                <p>Value: {{$wish->originalvalue}}</p>
                 <p>Expires on: {{$wish->expiration_date}}</p>
                 <p>description: {{$wish->description}}</p>
                <!-- Add more details as needed -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



            <br>
        @endforeach
      </td>
      <td><a href="{{ isset($child->id) ? route('createWish', ['child_id' => $child->id]) : route('createWish') }}" class="btn btn-primary" style="float: right;"> <i class="fa fa-plus-circle"></i> Wish</a></td>
    </tr>
@endforeach
@endforeach
 </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>










@endsection
