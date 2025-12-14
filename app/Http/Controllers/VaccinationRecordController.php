<?php

namespace App\Http\Controllers;

use App\Models\VaccinationRecord;
use Illuminate\Http\Request;

class VaccinationRecordController extends Controller
{
    public function index()
    {
        $vaccinationRecords = VaccinationRecord::with(['patient', 'vaccine', 'batch', 'worker'])->get();
        return view('vaccination_records.index', compact('vaccinationRecords'));
    }

    public function create()
    {
        $patients = \App\Models\Patient::all();
        $vaccines = \App\Models\Vaccine::all();
        $batches = \App\Models\Batch::all();
        $healthWorkers = \App\Models\HealthWorker::all();
        return view('vaccination_records.create', compact('patients', 'vaccines', 'batches', 'healthWorkers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,patient_id',
            'vaccine_id' => 'required|exists:vaccines,vaccine_id',
            'batch_id' => 'nullable|exists:batches,batch_id',
            'worker_id' => 'nullable|exists:health_workers,id',
            'dose_number' => 'required|integer',
            'date_given' => 'nullable|date',
            'status' => 'nullable|string',
            'remarks' => 'nullable|string',
        ]);

        VaccinationRecord::create($request->all());
        return redirect()->route('vaccination_records.index');
    }

    public function show(VaccinationRecord $vaccinationRecord)
    {
        $vaccinationRecord->load(['patient', 'vaccine', 'batch', 'worker']);
        return view('vaccination_records.show', compact('vaccinationRecord'));
    }

    public function edit(VaccinationRecord $vaccinationRecord)
    {
        $patients = \App\Models\Patient::all();
        $vaccines = \App\Models\Vaccine::all();
        $batches = \App\Models\Batch::all();
        $healthWorkers = \App\Models\HealthWorker::all();
        return view('vaccination_records.edit', compact('vaccinationRecord', 'patients', 'vaccines', 'batches', 'healthWorkers'));
    }

    public function update(Request $request, VaccinationRecord $vaccinationRecord)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,patient_id',
            'vaccine_id' => 'required|exists:vaccines,vaccine_id',
            'batch_id' => 'nullable|exists:batches,batch_id',
            'worker_id' => 'nullable|exists:health_workers,id',
            'dose_number' => 'required|integer',
            'date_given' => 'nullable|date',
            'status' => 'nullable|string',
            'remarks' => 'nullable|string',
        ]);

        $vaccinationRecord->update($request->all());
        return redirect()->route('vaccination_records.index');
    }

    public function destroy(VaccinationRecord $vaccinationRecord)
    {
        $vaccinationRecord->delete();
        return redirect()->route('vaccination_records.index');
    }
}
