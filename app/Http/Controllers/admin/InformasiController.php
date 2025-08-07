<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Dapil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformasiController extends Controller
{
    public function index()
    {
        $project = Auth::user()->project;
        $dapil = Dapil::where('project_id', $project->id)->first();
        $admin = User::where('role_id', 2)->where('project_id', $project->id)->get();
        $user = User::where('role_id', 3)->where('project_id', $project->id)->get();

        return view('pages.admin.informasi.index', compact([
            'admin',
            'user',
            'project',
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

    public function show(string $uuid)
    {
        //
    }

    public function edit(string $uuid)
    {
        //
    }

    public function update(Request $request, string $uuid)
    {
        //
    }

    public function destroy(string $uuid)
    {
        //
    }
}
