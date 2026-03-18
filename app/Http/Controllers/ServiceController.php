<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $divisions = Division::all();

        $query = Service::with('division');

        if ($request->filled('division_id')) {
            $query->where('division_id', $request->division_id);
        }

        $services = $query->latest()->paginate(10);

        return view('services.index', compact('services', 'divisions'));
    }

    public function create()
    {
        $divisions = Division::all();

        return view('services.create', compact('divisions'));
    }

    public function store(Request $request)
{
    $request->validate([
        'division_id' => 'required|exists:divisions,id',
        'name' => 'required|max:255|unique:services,name,NULL,id,division_id,' . $request->division_id,
        'code' => 'nullable'
    ], [
        'division_id.required' => 'La division est obligatoire.',
        'division_id.exists' => 'La division selectionnee est invalide.',
        'name.required' => 'Le nom du service est obligatoire.',
        'name.unique' => 'Ce service existe deja dans cette division.',
    ]);

    Service::create([
        'division_id' => $request->division_id,
        'name' => $request->name,
        'code' => $request->code,
        'is_active' => true
    ]);

    return redirect()->route('services.index')
        ->with('success', 'Service cree');
}
   public function show(Service $service)
{
    /** @var \App\Models\User $user */
    $user = Auth::user();

    if (!$user) {
        abort(403);
    }

    if ($user->hasPermissionTo('manage_services')) {
        return view('services.show', compact('service'));
    }

    if ($user->hasPermissionTo('view_own_service') && $user->service_id == $service->id) {
        return view('services.show', compact('service'));
    }

    abort(403);
}

    public function edit(Service $service)
    {
        $divisions = Division::all();

        return view('services.edit', compact('service', 'divisions'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'division_id' => 'required|exists:divisions,id',
            'name' => 'required|max:255',
            'code' => 'nullable'
        ]);

        $service->update([
            'division_id' => $request->division_id,
            'name' => $request->name,
            'code' => $request->code,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Service modifie');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service supprime');
    }

    public function myService()
{
    /** @var \App\Models\User $user */
    $user = Auth::user();

    if (!$user || !$user->service_id) {
        abort(403, 'Aucun service assigne.');
    }

    $service = Service::with('division')->findOrFail($user->service_id);

    return view('services.show', compact('service'));
}
}