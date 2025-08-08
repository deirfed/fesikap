<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Dapil;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function mainMenu()
    {
        $project = Auth::user()->project;

        if (!$project) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Login gagal. Kamu belum memiliki project. Silakan hubungi Admin!');
        }

        $project_id = $project->id;
        $tahun = Carbon::now()->format('Y');
        $dapil = Dapil::where('project_id', $project_id)->first();

        $kunjungan = Visit::where('project_id', $project_id)->get();

        return view('pages.user.navigasi.index', compact([
            'project',
            'kunjungan',
            'tahun',
            'dapil',
        ]));
    }

    public function index()
    {
        $project = Auth::user()->project;
        $project_id = $project->id;
        $tahun = Carbon::now()->format('Y');
        $dapil = Dapil::where('project_id', $project_id)->first();

        $kunjungan = Visit::where('project_id', $project_id)->get();

        return view('pages.user.dashboard.index', compact([
            'project',
            'kunjungan',
            'tahun',
            'dapil',
        ]));
    }

    public function store(Request $request)
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
