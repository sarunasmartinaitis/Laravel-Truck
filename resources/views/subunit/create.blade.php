<!DOCTYPE html>
<html>
<head>
  <title>Truck Subunit</title>
  <script src="//unpkg.com/alpinejs" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="container mx-auto px-4 max-w-sm">
    <h1 class="text-2xl font-bold mb-4">Create Truck Subunit</h1>
    <form action="/subunits" method="POST" class="bg-white rounded shadow px-4 py-2">
      @csrf
      <div class="mb-4">
        <label for="main_truck_id" class="block mb-1">Main Truck:</label>
        <select name="main_truck_id" id="main_truck_id" class="w-full px-2 py-1 border rounded" required >
          @foreach($trucks as $truck)
            <option value="{{ $truck->id }}" {{ old('main_truck_id') == $truck->id ? 'selected' : '' }}>
              {{ $truck->unit_number }}
            </option>
          @endforeach
          @error('main_truck_id')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </select>
      </div>
      <div class="mb-4">
        <label for="subunit_truck_id" class="block mb-1">Subunit:</label>
        <select name="subunit_truck_id" id="subunit_truck_id" class="w-full px-2 py-1 border rounded" value="{{old('subunit_truck_id')}}" required>
          @foreach($trucks as $truck)
            <option value="{{ $truck->id }}" {{ old('subunit_truck_id') == $truck->id ? 'selected' : '' }}>
              {{ $truck->unit_number }}
            </option>
          @endforeach
        </select>
        @error('subunit_truck_id')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="start_date" class="block mb-1">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required class="w-full px-2 py-1 border rounded" value="{{old('start_date')}}">
        @error('start_date')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="end_date" class="block mb-1">End Date:</label>
        <input type="date" id="end_date" name="end_date" required class="w-full px-2 py-1 border rounded" value="{{old('end_date')}}">
        @error('end_date')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
      </div>
      @error('error')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
      <div>
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 rounded">Save Subunit</button>
      </div>
    </form>
  </div>
  <x-flash-message />
</body>
</html>
