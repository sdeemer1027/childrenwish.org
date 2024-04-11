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
                   @foreach($guardians as $guardian)
{{$guardian->name}} {{$guardian->user->email}}<BR>

                   @endforeach

                   {{$guardians}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
