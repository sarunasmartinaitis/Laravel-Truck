@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" style="position: fixed; top: 0; left: 50%; transform: translateX(-50%); background-color: red; color: white; padding: 1rem 3rem;">
    <p>
        {{session('message')}}
    </p>
</div>
@endif