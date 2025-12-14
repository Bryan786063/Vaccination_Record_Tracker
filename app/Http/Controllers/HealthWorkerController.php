<?php

namespace App\Http\Controllers;

use App\Models\HealthWorker;
use Illuminate\Http\Request;

class HealthWorkerController extends Controller
{
    public function index()
    {
        $healthWorkers = HealthWorker::all();
        return view('health_workers.index', compact('healthWorkers'));
    }

    public function create()
    {
        return view('health_workers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'license_no' => 'nullable|string',
            'contact' => 'nullable|string',
            'role' => 'nullable|string',
        ]);

        HealthWorker::create($request->all());
        return redirect()->route('health_workers.index');
    }

    public function show(HealthWorker $healthWorker)
    {
        return view('health_workers.show', compact('healthWorker'));
    }

    public function edit(HealthWorker $healthWorker)
    {
        return view('health_workers.edit', compact('healthWorker'));
    }

    public function update(Request $request, HealthWorker $healthWorker)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'license_no' => 'nullable|string',
            'contact' => 'nullable|string',
            'role' => 'nullable|string',
        ]);

        $healthWorker->update($request->all());
        return redirect()->route('health_workers.index');
    }

    public function destroy(HealthWorker $healthWorker)
    {
        $healthWorker->delete();
        return redirect()->route('health_workers.index');
    }
}
