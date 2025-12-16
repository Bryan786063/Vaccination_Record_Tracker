<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        $totalPatients = Patient::count();
        return view('patients.index', compact('patients', 'totalPatients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'dob' => 'nullable|date',
            'contact' => 'nullable|string',
            'eligibility_status' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        Patient::create($request->all());
        return redirect()->route('patients.index');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string',
            'dob' => 'nullable|date',
            'contact' => 'nullable|string',
            'eligibility_status' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $patient->update($request->all());
        return redirect()->route('patients.index');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index');
    }
}
