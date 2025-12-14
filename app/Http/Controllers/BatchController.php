<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::all();
        return view('batches.index', compact('batches'));
    }

    public function create()
    {
        return view('batches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vaccine_id' => 'required|exists:vaccines,id',
            'batch_number' => 'nullable|string',
            'expiry_date' => 'nullable|date',
            'quantity' => 'required|integer',
            'received_date' => 'nullable|date',
        ]);

        Batch::create($request->all());
        return redirect()->route('batches.index');
    }

    public function show(Batch $batch)
    {
        return view('batches.show', compact('batch'));
    }

    public function edit(Batch $batch)
    {
        return view('batches.edit', compact('batch'));
    }

    public function update(Request $request, Batch $batch)
    {
        $request->validate([
            'vaccine_id' => 'required|exists:vaccines,id',
            'batch_number' => 'nullable|string',
            'expiry_date' => 'nullable|date',
            'quantity' => 'required|integer',
            'received_date' => 'nullable|date',
        ]);

        $batch->update($request->all());
        return redirect()->route('batches.index');
    }

    public function destroy(Batch $batch)
    {
        $batch->delete();
        return redirect()->route('batches.index');
    }
}
