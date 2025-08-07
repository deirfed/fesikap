<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Dapil;
use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemiluController extends Controller
{
    public function index(Request $request)
    {
        $project = Auth::user()->project;
        $dapil = Dapil::where('project_id', $project->id)->first();
        $pemilu = Election::all();

        return view('pages.admin.pemilu.index', compact([
            'project',
            'dapil',
            'pemilu',
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

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
