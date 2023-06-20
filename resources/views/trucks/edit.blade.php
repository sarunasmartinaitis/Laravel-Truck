<!DOCTYPE html>
<html>
<head>
  <title>Trucks CRUD - Edit Truck</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">

    <div class="jumbotron text-center">
        <h2>Edit Truck</h2>
    </div>

    <form method="POST" action="/trucks/{{$truck->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="unit_number">Unit number:</label>
            <input type="text" id="unit_number" name="unit_number" class="form-control" value="{{ $truck->unit_number }}" required>
            @error('unit_number')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="year">Year:</label>
            <input type="number" id="year" name="year" class="form-control" value="{{ $truck->year }}" required>
        </div>

        <div class="form-group">
            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes" class="form-control">{{ $truck->notes }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Truck</button>
    </form>
    
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
