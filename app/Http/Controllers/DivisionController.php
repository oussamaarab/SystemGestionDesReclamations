<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{

    public function index()
    {
        $divisions = Division::latest()->paginate(10);

        return view('divisions.index', compact('divisions'));
    }


    public function create()
    {
        return view('divisions.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'nullable|unique:divisions,code',
        ]);

        Division::create([
            'name' => $request->name,
            'code' => $request->code,
            'is_active' => true
        ]);

        return redirect()->route('divisions.index')
            ->with('success', 'Division créée avec succès');
    }


    public function show(Division $division)
    {
        return view('divisions.show', compact('division'));
    }


    public function edit(Division $division)
    {
        return view('divisions.edit', compact('division'));
    }


    public function update(Request $request, Division $division)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'nullable|unique:divisions,code,' . $division->id,
        ]);

        $division->update([
            'name' => $request->name,
            'code' => $request->code,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('divisions.index')
            ->with('success', 'Division modifiée');
    }


    public function destroy(Division $division)
    {
        if ($division->services()->exists()) {
            return redirect()->route('divisions.index')
                ->with('error', 'Impossible de supprimer cette division car elle est liee a un ou plusieurs services.');
        }

        $division->delete();

        return redirect()->route('divisions.index')
            ->with('success', 'Division supprimee avec succes.');
    }
}