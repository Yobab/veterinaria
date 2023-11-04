<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatments = Treatment::get(); // Include associated patients
        return view('treatments.index', compact('treatments'));
    }

    public function create()
    {
        return view('treatments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $treatmentData = $request->all();

        Treatment::create($treatmentData);

        return redirect()->route('treatments.index')
            ->with('success', 'Tratamiento creada exitosamente');
    }

    public function show($id)
    {

        $treatment = Treatment::find($id); // Include associated patient

        return view('treatments.show', compact('treatment'));
    }

    public function edit($id)
    {
        $treatment = Treatment::find($id); // Include associated patient

        return view('treatments.edit', compact('treatment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $treatment = Treatment::find($id);
        $treatment->update($request->all());

        return redirect()->route('treatments.index')
            ->with('success', 'Tratamiento actualizada exitosamente');
    }

    public function destroy($id)
    {
        $treatment = Treatment::find($id);
        $treatment->delete();

        return redirect()->route('treatments.index')
            ->with('success', 'Tratamiento eliminada exitosamente');
    }
}
