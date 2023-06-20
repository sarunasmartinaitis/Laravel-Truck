@props(['truck'])

<x-card>
  <div class="flex flex-col">
    <h3 class="text-xl font-bold mb-2">{{ $truck->unit_number }}</h3>
    <p class="text-sm text-gray-600">Year: {{ $truck->year }}</p>
    @if($truck->notes)
      <p class="text-sm mt-2">Notes: {{ $truck->notes }}</p>
    @endif
    <div class="flex justify-end mt-2 mb-[-20px]">
        <form action="/trucks/{{ $truck->id }}/edit" method="GET">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Update </button>
        </form>
        <form action="/trucks/{{ $truck->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this truck?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Delete
            </button>
        </form>
    </div>
  </div>
</x-card>
