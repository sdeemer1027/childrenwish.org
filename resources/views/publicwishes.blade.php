@extends('layouts.app')

@section('content')
<style>

.custom-bg1 {
    background-color: #e5d315; /* Green color */
/*  transition: background-color 0.3s ease; */ /* Smooth transition effect */
}

.custom-bg1:hover {
    background-color: #d4c40f; /* New background color on hover */
}

.custom-bg2 {
    background-color: #15d4e5; /* Green color */
}

.custom-bg3 {
    background-color: #d1e515; /* Green color */
}

.custom-bg4 {
    background-color: #e515b182; /* Green color */
}

.custom-bg5 {
    background-color: #2ee515a1; /* Green color */
}

.custom-bg6 {
    background-color: #8fade9; /* Green color */
}

.custom-bg7 {
    background-color: #db397030; /* Green color */
}


.custom-bg2:hover {
    background-color: #0f9ba7; /* New background color on hover for custom-bg2 */
}

.custom-bg3:hover {
    background-color: #b8e515; /* New background color on hover for custom-bg3 */
}

.custom-bg4:hover {
    background-color: #f99015; /* New background color on hover for custom-bg4 */
}

.custom-bg5:hover {
    background-color: #15e58c; /* New background color on hover for custom-bg5 */
}

.custom-bg6:hover {
    background-color: #e51542; /* New background color on hover for custom-bg6 */
}

.custom-bg7:hover {
    background-color: #30db39; /* New background color on hover for custom-bg7 */
}



</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Our Wishes in need of attention</div>

                <div class="card-body">                    
                    @foreach($category as $cat)
                      <a href="{{ route('category.wishes', ['catis' => $cat->id]) }}" class="btn btn-sm  custom-bg{{$cat->id}}">{{$cat->name}}</a>
                    @endforeach
                      <BR><BR>
                    
                    <div class="row justify-content-center">

                    @foreach($wishes as $wish)
                    <div class="card col-md-4  mb-3">
                     <div class="card-header  custom-bg{{$wish->category_id}}">{{$wish->name}} Expires: {{ date('m/d', strtotime($wish->expiration_date)) }}<span style="float: right;"><i class="fa fa-eye" aria-hidden="true"></i></span></div>
                      <div class="card-body">
                        {{$wish->child->name}} Age: ({{$wish->child->age}})<hr>Created : {{$wish->created_at->format('M-d-Y')}}  Valued At : ${{$wish->value}}<BR>                        
                        {!! $wish->description !!}
                      </div>
                     </div>


                    @endforeach
                    {{$wishes}}
                    </div>


<BR><BR><BR>


                   {{--$wishes--}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
