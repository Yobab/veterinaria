<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Patient;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public function index()
    {
        $dates = Date::with('patient')->get(); // Include associated patients
        return view('dates.index', compact('dates'));
    }

    public function create()
    {
        $patients = Patient::all(); // Include patients for dropdown menu
        return view('dates.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'datetime' => 'required',
            'patient_id' => 'required',
        ]);

        $dateData = $request->all();

        Date::create($dateData);

        return redirect()->route('dates.index')
            ->with('success', 'Cita creada exitosamente');
    }

    public function show($id)
    {

        $date = Date::with('patient')->find($id); // Include associated patient
        $patients = Patient::all(); // Include patients for dropdown menu

        return view('dates.show', compact('date', 'patients'));
    }

    public function edit($id)
    {
        $date = Date::with('patient')->find($id); // Include associated patient
        $patients = Patient::all(); // Include patients for dropdown menu
        return view('dates.edit', compact('date', 'patients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'datetime' => 'required',
            'patient_id' => 'required',
        ]);

        $date = Date::find($id);
        $date->update($request->all());

        return redirect()->route('dates.index')
            ->with('success', 'Cita actualizada exitosamente');
    }

    public function destroy($id)
    {
        $date = Date::find($id);
        $date->delete();

        return redirect()->route('dates.index')
            ->with('success', 'Cita eliminada exitosamente');
    }
}
