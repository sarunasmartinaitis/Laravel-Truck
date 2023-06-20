<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use App\Models\TruckSubunit;
use Illuminate\Http\Request;

class TruckSubunitController extends Controller
{
    public function create()
    {
        return view('subunit.create', ['trucks' => Truck::all()]);
    }

    public function store(Request $request)
    {
        $formField = $request->validate([
            'main_truck_id' => 'required|integer',
            'subunit_truck_id' => 'required|integer|different:main_truck_id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Ensure a truck does not have overlapping subunit dates
        $existingSubunitDates = TruckSubunit::where('main_truck_id', $request->main_truck_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })
            ->exists();

        if ($existingSubunitDates) {
            return back()->withInput()->withErrors(['error' => 'The provided dates overlap with existing subunit dates.']);
        }

        // Check if the truck being assigned as a subunit is not already acting as a main truck for the current main truck during the same period
        $datesOverlap = function ($query) use ($request) {
            $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                ->orWhere(function ($query) use ($request) {
                    $query->where('start_date', '<=', $request->start_date)
                        ->where('end_date', '>=', $request->end_date);
                });
        };

        $truckIsSubunitToEachOther = TruckSubunit::where(function ($query) use ($request, $datesOverlap) {
            $query->where('main_truck_id', $request->main_truck_id)
                ->where('subunit_truck_id', $request->subunit_truck_id)
                ->where($datesOverlap);
        })
            ->orWhere(function ($query) use ($request, $datesOverlap) {
                $query->where('main_truck_id', $request->subunit_truck_id)
                    ->where('subunit_truck_id', $request->main_truck_id)
                    ->where($datesOverlap);
            })
            ->exists();

        if ($truckIsSubunitToEachOther) {
            return back()->withInput()->withErrors(['error' => 'The main truck and the subunit truck cannot be subunits to each other during the same period.']);
        }

        TruckSubunit::create($formField);

        return redirect('/subunits/create')->with('message', 'Subunit created successfully!');
    }
}
