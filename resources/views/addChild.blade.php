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
                   

 <h2>Add Child</h2>

{{--$guardianID--}}


        <form method="POST" action="{{ route('storeChild') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

<div class="form-group">
    <label for="birth_date">Birth Date:</label>
    <input type="text" id="birth_date" name="birth_date" class="form-control" placeholder="Select Birth date">
</div>

            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>


<div class="mb-3">
                <label for="type" class="form-label">Relationship:</label>
<select name="type" id="type" class="form-select">
    <option value="Natural" >Natural</option>
    <option value="Foster" >Foster</option>   
    <option value="Adopted" >Adopted</option>
    <option value="Legal Custody" >Legal Custody</option>

</select>
            </div>
            <div class="mb-3">
                <label for="illness" class="form-label">Illness:</label>
                
<select name='illness' id='illness' class="form-select">
<option value="None">None</option>
<option value="Terminal">Terminal</option>
<option value="Cancer">Cancer</option>
<option value="Other">Other</option>
</select>

            </div>


  <input type="hidden" class="form-control" id="guardian_id" name="guardian_id" value="{{$guardianID->id}}">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



                </div>
            </div>
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
