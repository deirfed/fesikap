<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Project;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $project = Auth::user()->project;
        $users = User::where('project_id', $project->id)
            ->whereNot('role_id', 1)
            ->orderBy('name', 'ASC')
            ->get();

        return view('pages.admin.user.index', compact([
            'users',
            'project',
        ]));
    }

    public function create()
    {
        $roles = Role::whereNot('id', 1)->get();
        $genders = Gender::all();
        return view('pages.admin.user.create', compact([
            'roles',
            'genders',
        ]));
    }

    public function store(Request $request)
    {
        $rawData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'role_id' => 'required|numeric|exists:role,id',
            'gender_id' => 'required|numeric|exists:gender,id',
        ]);

        $rawData['password'] = Hash::make('sikap123');
        $rawData['project_id'] = Auth::user()->project_id;

        $data = User::updateOrCreate($rawData, $rawData);

        return redirect()->route('user.index')->with('success', 'Data user ' . $data->name . ' berhasil Ditambahkan');
    }

    public function edit($uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        $roles = Role::whereNot('id', 1)->get();
        $genders = Gender::all();

        return view('pages.admin.user.edit', compact('user', 'roles', 'genders'));
    }

    public function update(Request $request, $uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|numeric',
            'role_id' => 'required|numeric|exists:role,id',
            'gender_id' => 'required|numeric|exists:gender,id',
        ]);

        $user->update($validated);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}
