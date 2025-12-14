<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function index()
    {
        $vaccines = Vaccine::all();
        return view('vaccines.index', compact('vaccines'));
    }

    public function create()
    {
        return view('vaccines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'manufacturer' => 'nullable|string',
            'doses_required' => 'required|integer',
            'notes' => 'nullable|string',
        ]);

        Vaccine::create($request->all());
        return redirect()->route('vaccines.index');
    }

    public function show(Vaccine $vaccine)
    {
        return view('vaccines.show', compact('vaccine'));
    }

    public function edit(Vaccine $vaccine)
    {
        return view('vaccines.edit', compact('vaccine'));
    }

    public function update(Request $request, Vaccine $vaccine)
    {
        $request->validate([
            'name' => 'required|string',
            'manufacturer' => 'nullable|string',
            'doses_required' => 'required|integer',
            'notes' => 'nullable|string',
        ]);

        $vaccine->update($request->all());
        return redirect()->route('vaccines.index');
    }

    public function destroy(Vaccine $vaccine)
    {
        $vaccine->delete();
        return redirect()->route('vaccines.index');
    }
}
