<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
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

    public function index(UserDataTable $dataTable, Request $request)
    {
        $status = $request->status ?? 'active';
        $role_id = $request->role_id ?? null;

        $project = Auth::user()->project;
        $roles = Role::whereNot('id', 1)->get();

        return $dataTable->with([
            'status' => $status,
            'role_id' => $role_id,
        ])->render('pages.admin.user.index', compact([
            'project',
            'roles',
            'status',
            'role_id',
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

        $roleId = $request->role_id;
        $project_id = Auth::user()->project_id;

        // Ambil limit dari ENV
        $limitRoleAdmin = env('LIMIT_ROLE_ADMIN', 1);
        $limitRoleUser = env('LIMIT_ROLE_USER', 8);

        if ($roleId == 2) {
            $count = User::where('role_id', 2)->where('project_id', $project_id)->count();
            if ($count >= $limitRoleAdmin) {
                return redirect()->route('user.index')->withErrors([
                    'role_id' => "Akun dengan role ini sudah mencapai batas maksimal (hanya {$limitRoleAdmin} user)"
                ]);
            }
        }

        if ($roleId == 3) {
            $count = User::where('role_id', 3)->where('project_id', $project_id)->count();
            if ($count >= $limitRoleUser) {
                return redirect()->route('user.index')->withErrors([
                    'role_id' => "Akun dengan role ini sudah mencapai batas maksimal (hanya {$limitRoleUser} user)"
                ]);
            }
        }

        $rawData['password'] = Hash::make(env('DEFAULT_PASSWORD', 'sikap123'));
        $rawData['project_id'] = $project_id;

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

    public function activate($uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();

        $user->unban();

        return redirect()->route('user.index')->with('success', 'User berhasil diaktifkan kembali!');
    }

    public function destroy($uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();

        if($user->id == Auth::user()->id){
            return redirect()->route('user.index')->with('error', 'Anda tidak bisa melakukan ban akun sendiri.');
        }

        $user->ban();

        return redirect()->route('user.index')->with('success', 'User berhasil di-ban!');
    }
}
