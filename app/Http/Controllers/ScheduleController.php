<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('schedules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,patient_id',
            'vaccine_id' => 'required|exists:vaccines,vaccine_id',
            'dose_number' => 'required|integer',
            'scheduled_date' => 'nullable|date',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        Schedule::create($request->all());
        return redirect()->route('schedules.index');
    }

    public function show(Schedule $schedule)
    {
        return view('schedules.show', compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        return view('schedules.edit', compact('schedule'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,patient_id',
            'vaccine_id' => 'required|exists:vaccines,vaccine_id',
            'dose_number' => 'required|integer',
            'scheduled_date' => 'nullable|date',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $schedule->update($request->all());
        return redirect()->route('schedules.index');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index');
    }
}
