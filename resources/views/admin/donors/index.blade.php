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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection