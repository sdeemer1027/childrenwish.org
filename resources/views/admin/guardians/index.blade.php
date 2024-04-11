@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-4">
              @include('partials.admin_side_menu')
</div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Guardians</div>

                <div class="card-body">
                   Guardian Controller
                   <hr>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Children</th>
    </tr>
  </thead>
  <tbody>
     @foreach($guardians as $guardian)
    <tr>
      <th>{{$guardian->id}}</th>
      <td>{{$guardian->name}}</td>
      <td> {{$guardian->user->email}}</td>
      <td>
          @foreach($guardian->children as $child)
<li>{{$child->name}} Age: {{$child->age}} </li>
@endforeach
      </td>
    </tr>
   @endforeach
  </tbody>
</table>

<hr>
                   {{--$guardians--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
