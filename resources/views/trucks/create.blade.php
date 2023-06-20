<!DOCTYPE html>
<html>
<head>
  <title>Create Truck</title>
  <script src="//unpkg.com/alpinejs" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100">
  <div class="container mx-auto px-4 max-w-sm">
    <h1 class="text-2xl font-bold mb-4">Create Truck</h1>
      <form action="/trucks" method="POST" class="bg-white rounded shadow px-4 py-2">
        @csrf
        <div class="mb-4">
          <label for="unit_number" class="block mb-1">Unit number:</label>
          <input type="text" id="unit_number" name="unit_number" required maxlength="255" value="{{old('unit_number')}}" class="w-full px-2 py-1 border rounded">
          @error('unit_number')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-4">
          <label for="year" class="block mb-1">Year:</label>
          <input type="number" id="year" name="year" required min="1900" max="{{ date('Y') + 5 }}" value="{{old('year')}}" class="w-full px-2 py-1 border rounded">
        </div>
        <div class="mb-4">
          <label for="notes" class="block mb-1">Notes:</label>
          <textarea id="notes" name="notes" class="w-full px-2 py-1 border rounded resize-none" rows="4">{{old('notes')}}</textarea>
        </div>
        <div>
          <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 rounded">Save Truck</button>
        </div>
      </form>
    </div>
  <x-flash-message />
</body>
</html>
