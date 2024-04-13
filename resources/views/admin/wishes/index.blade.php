@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-4">
              @include('partials.admin_side_menu')
</div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Wishes</div>

                <div class="card-body">
                    
                    Wish Controller 
<hr>
<table  id="wishes-table" class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Title</th>
      <th scope="col">Value</th>
      <th scope="col">Child</th>
      <th scope="col">Child Age</th>
      <th scope="col">Guardian</th>
    </tr>
  </thead>
  <tbody>
    
    
@foreach($wishes as $wish)
<tr>
      <th scope="row">{{ $wish->id }}</th>
      <td>{{ $wish->category->name }}</td>
      <td>{{ $wish->name }}</td>
      <td>{{ $wish->value }}</td>
       <td>{{ $wish->child->name }}</td>
       <td>{{ $wish->child->age }}</td>
       <td>{{ $wish->child->guardian->name }}</td>
    </tr>

@endforeach

  </tbody>
</table>

<hr>
                    {{$wishes}}

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
