<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TruckController extends Controller
{
    public function index()
    {
        return view('trucks.index', ['trucks' => Truck::all()]);
    }

    // Show Create Form
    public function create()
    {
        return view('trucks.create');
    }

    public function store(Request $request)
    {
        $formField = $request->validate([
            'unit_number' => ['required', 'max:255', Rule::unique('trucks', 'unit_number')],
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 5),
            'notes' => 'nullable|string',
        ]);

        Truck::create($formField);
        return redirect('/trucks/create')->with('message', 'Truck created successfully!');
    }

    // Show Edit Form
    public function edit(Truck $truck)
    {
        return view('trucks.edit', ['truck' => $truck]);
    }

    public function update(Request $request, Truck $truck)
    {
        $formField = $request->validate([
            'unit_number' => ['required', 'max:255', Rule::unique('trucks', 'unit_number')->ignore($truck->id)],
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 5),
            'notes' => 'nullable|string',
        ]);

        $truck->update($formField);

        return redirect('/')->with('message', 'Truck updated successfully!');
    }

    // Delete Listing
    public function destroy(Truck $truck)
    {
        $truck->delete();
        return redirect('/')->with('message', 'Truck deleted successfully');
    }
}
