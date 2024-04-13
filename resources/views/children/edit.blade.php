<!-- resources/views/children/edit.blade.php -->

@extends('layouts.app')

@section('content')
<!-- Include Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<form action="{{ route('updateChild', $child->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" class="form-control" value="{{ $child->name }}" required>
<br>


<div class="form-group">
    <label for="birth_date">Birth Date:</label>
    <input type="text" id="birth_date" name="birth_date" class="form-control" placeholder="Select Birth date">
</div>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" class="form-control" value="{{ $child->age }}" required>
<br>
    <!-- Add other fields as needed -->

<label for="type">Type:</label>
    <!-- input type="text" id="type" name="type" value="{{ $child->type }}" -->

<select name="type" id="type" class="form-select">
    <option value="Natural" @if($child->type == 'Natural') selected=selected @endif>Natural</option>
    <option value="Foster" @if($child->type == 'Foster') selected=selected @endif>Foster</option>   
    <option value="Adopted" @if($child->type == 'Adopted') selected=selected @endif>Adopted</option>
    <option value="Legal Custody" @if($child->type == 'Legal Custody') selected=selected @endif>Legal Custody</option>

</select>



<br>
<label for="illness">Illness:</label>
    <!-- input type="text" id="illness" name="illness" class="form-control" value="{{ $child->illness }}" -->

<select name='illness' id='illness' class="form-select">
<option value="None" @if($child->illness == 'None') selected=selected @endif>None</option>
<option value="Terminal" @if($child->illness == 'Terminal') selected=selected @endif>Terminal</option>
<option value="Cancer" @if($child->illness == 'Cancer') selected=selected @endif>Cancer</option>
<option value="Other" @if($child->illness == 'Other') selected=selected @endif>Other</option>

</select>



<br>

    <button type="submit" class="btn btn-primary">Update Child</button>
</form>


</div>
    </div>
</div>


<!-- Include Flatpickr JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    // Initialize Flatpickr for the expiration date input field
    flatpickr('#birth_date', {
        dateFormat: 'Y-m-d', // Set the date format according to your preference
       // minDate: 'today', // Optionally, set a minimum date (e.g., today's date)
        // You can add more options as needed
    });
</script>
@endsection
