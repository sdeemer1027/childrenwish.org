@extends('layouts.app')

@section('content')
<!-- Include Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                   

 <h2>Edit a Wish</h2>

 <form method="POST" action="{{ route('updateWish', ['wish_id' => $wish_id ?? null]) }}">
            @csrf
            @method('PUT')
   <input type="hidden" name="child_id" value="{{ $wish->child_id }}">

            @if(isset($wish_id))
                <input type="hidden" name="wish_id" value="{{ $wish_id }}">
         
@endif
 <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input class="form-control" id="name" name="name" value="{{$wish->name}}" required>

                <label for="category_id" class="form-label">Category</label>
                <select id="category_id" name="category_id" class="form-select" >
                    @foreach( $categories as $category)
                    <option value="{{$category->id}}" @if($category->id == $wish->category_id) selected=selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>

                 <label for="value" class="form-label">Value the value  {{$wish->value}} is the added administration fees</label>
                <input class="form-control" id="value" name="value" value="{{$wish->originalvalue}}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{$wish->description}}</textarea>
            </div>

<div class="form-group">
    <label for="expiration_date">Expiration Date:</label>
    <input type="text" id="expiration_date" name="expiration_date" class="form-control" value="{{$wish->expiration_date}}" placeholder="Select expiration date">
</div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

<!-- Include Flatpickr JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    // Initialize Flatpickr for the expiration date input field
    flatpickr('#expiration_date', {
        dateFormat: 'Y-m-d', // Set the date format according to your preference
        minDate: 'today', // Optionally, set a minimum date (e.g., today's date)
        // You can add more options as needed
    });
</script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
