<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Dapil;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $project = Auth::user()->project;
        $dapil = Dapil::where('project_id', $project->id)->first();
        $admin = User::where('role_id', 2)->where('project_id', $project->id)->get();
        $user = User::where('role_id', 3)->where('project_id', $project->id)->get();

        return view('pages.admin.profile.index', compact([
            'project',
            'dapil',
            'admin',
            'user',
        ]));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $uuid)
    {
        $data = Profile::where('uuid', $uuid)->firstOrFail();
        $rawData = $request->validate([
            'email' => 'nullable|string',
            'phone' => 'required|string',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $data->update($rawData);

        return redirect()->route('profile.index')->with('success', 'Data profile berhasil diubah.');
    }

    public function destroy(string $id)
    {
        //
    }
}
