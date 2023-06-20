<script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
        theme: {
          extend: {
            colors: {
              laravel: '#ef3b2d',
            },
          },
        },
      }
  </script>
  
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @unless(count($trucks) == 0)

    @foreach($trucks as $truck)
        <x-trucks-card :truck="$truck" />
    @endforeach

    @else
    <p>No Trucks found</p>
    @endunless
</div>
<x-flash-message />