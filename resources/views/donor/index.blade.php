@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">As a Donor you Help many children just wish</div>

                <div class="card-body">                    
                    
                      <BR><BR>
                    
                    <div class="row justify-content-center">

             
                    <div class="card col-md-12">
                     <div class="card-header"><span style="float: right;"><i class="fa fa-eye" aria-hidden="true"></i></span></div>
                      <div class="card-body">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Amount</th>
      <th scope="col">Date</th>
      <th scope="col">Wish</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    @foreach($donations as $donation)


    <tr>
      
      <td>{{$donation->amount}}</td>
      <td>{{$donation->created_at}}</td>
      <td>@if($donation->wish_id == NULL)
        General Fund
        @else
        {{$donation->wish_id}}
        @endif
    </td>
      <td></td>
    </tr>
@endforeach 
  </tbody>
</table>
                       {{--$role--}}
                        {{--$user--}}              
                        {{--$donations--}}
                      </div>
                     </div>


                    </div>


<BR><BR><BR>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
