@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-4">
              @include('partials.admin_side_menu')
</div>


        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Children</div>

                <div class="card-body">
                   Children Controller
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
