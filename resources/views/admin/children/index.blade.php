@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-2">
              @include('partials.admin_side_menu')
</div>


        <div class="col-md-10">
            <div class="card">
                <div class="card-header">All Children</div>

                <div class="card-body">
                   Children Controller
                   <hr>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Guardian</th>
      <th scope="col">Age</th>
    </tr>
  </thead>
  <tbody>
     @foreach($children as $child)
    <tr>
      <th>{{$child->id}}</th>
      <td>{{$child->name}}</td>
      <td> {{$child->guardian->name}}</td>
      <td>
        
 {{$child->age}} 
      </td>
    </tr>
   @endforeach
  </tbody>
</table>




                   {{--$children--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
