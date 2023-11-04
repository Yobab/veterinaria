<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage; // Add this line at the top

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'race' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $patientData = $request->all();

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('profile_images'), $imageName);

            $patientData['profile_image'] = $imageName;
        }

        Patient::create($patientData);

        return redirect()->route('patients.index')
            ->with('success', 'Patient creada exitosamente');
    }

    public function show($id)
    {
        $patient = Patient::find($id);
        return view('patients.show', compact('patient'));
    }
    public function showPdf($id)
    {
        $patient = Patient::with(['diseases', 'allergies'])->find($id);
        $pdf = PDF::loadView('patients.pdf', compact('patient'));

        return $pdf->stream('patient_info.pdf');
    }
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'race' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $patientData = $request->except(['_token', '_method']);

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('profile_images'), $imageName);

            $patientData['profile_image'] = $imageName;
        }

        $patient->update($patientData);

        return redirect()->route('patients.index')
            ->with('success', 'Patient actualizada exitosamente');
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success', 'Patient eliminada exitosamente');
    }
}
