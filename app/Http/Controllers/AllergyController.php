<?php

namespace App\Http\Controllers;

use App\Models\Allergy;
use App\Models\Patient;
use App\Models\Treatment;
use Illuminate\Http\Request;

class AllergyController extends Controller
{
    public function index()
    {
        $allergies = Allergy::with([
            'treatment',
            'patient'
        ],)->get(); // Include associated treatments
        return view('allergies.index', compact('allergies'));
    }

    public function create()
    {
        $treatments = Treatment::all();
        $patients = Patient::all();
        return view('allergies.create', compact('treatments', 'patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'treatment_id' => 'nullable',
            'patient_id' => 'required',
        ]);

        $allergyData = $request->all();

        Allergy::create($allergyData);

        return redirect()->route('allergies.index')
            ->with('success', 'Alergia creada exitosamente');
    }

    public function show($id)
    {

        $allergy = Allergy::with([
            'treatment',
            'patient'
        ])->find($id); // Include associated treatment
        $treatments = Treatment::all();
        $patients = Patient::all();
        return view('allergies.show', compact('allergy', 'treatments', 'patients'));
    }

    public function edit($id)
    {
        $allergy = Allergy::with([
            'treatment',
            'patient'
        ])->find($id); // Include associated treatment
        $treatments = Treatment::all();
        $patients = Patient::all();
        return view('allergies.edit', compact('allergy', 'treatments', 'patients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'treatment_id' => 'nullable',
            'patient_id' => 'required',
        ]);

        $allergy = Allergy::find($id);
        $allergy->update($request->all());

        return redirect()->route('allergies.index')
            ->with('success', 'Alergia actualizada exitosamente');
    }

    public function destroy($id)
    {
        $allergy = Allergy::find($id);
        $allergy->delete();

        return redirect()->route('allergies.index')
            ->with('success', 'Alergia eliminada exitosamente');
    }
}
