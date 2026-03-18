<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use User as GlobalUser;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('service', 'roles')->latest()->paginate(10);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $services = Service::all();
        $roles = Role::all();

        return view('users.create', compact('services', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'service_id' => 'nullable|exists:services,id',
            'role' => 'required|exists:roles,name',
        ]);

        $user =User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'service_id' => $request->service_id,
            'is_active' => true,
        ]);

        $user->assignRole($request->role);

        return redirect()->route('users.index')
            ->with('success', 'User créé avec succès');
    }

    public function show(User $user)
    {
        $user->load('service', 'roles');

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $services = Service::all();
        $roles = Role::all();

        return view('users.edit', compact('user', 'services', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'service_id' => 'nullable|exists:services,id',
            'role' => 'required|exists:roles,name',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'service_id' => $request->service_id,
            'is_active' => $request->has('is_active'),
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $user->syncRoles([$request->role]);

        return redirect()->route('users.index')
            ->with('success', 'User modifié avec succès');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User supprimé avec succès');
    }
}