@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-4">
              @include('partials.admin_side_menu')
</div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Donors</div>

                <div class="card-body">
                  Donors Controller




<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">Phone</th>
    </tr>
  </thead>
  <tbody>
     @foreach($users as $user)
    <tr>
      <th>{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td> {{$user->email}}</td>
      <td>
        
 {{$user->phone}} 
      </td>
    </tr>
   @endforeach
  </tbody>
</table>







                  {{--$users--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
