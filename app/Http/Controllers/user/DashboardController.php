<?php

namespace App\Http\Controllers\user;

use App\DataTables\AktivitasDataTable;
use App\Http\Controllers\Controller;
use App\Models\Dapil;
use App\Models\Desa;
use App\Models\RelasiDapil;
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

    public function index(AktivitasDataTable $dataTable)
    {
        $project = Auth::user()->project;
        $project_id = $project->id;
        $tahun = Carbon::now()->format('Y');
        $dapil = Dapil::where('project_id', $project_id)->first();

        $kunjungan = Visit::where('project_id', $project_id)->get();

        // 1. Total kunjungan
        $totalKunjungan = $kunjungan->count();

        // 2. Jumlah desa terkunjungi (jumlah & persentase)
        $dapil = Dapil::where('project_id', $project_id)->first();
        $kabupaten_ids = RelasiDapil::where('dapil_id', $dapil->id)->pluck('kabupaten_id');
        $totalDesa = Desa::whereHas('kecamatan.kabupaten', function ($query) use ($kabupaten_ids) {
            $query->whereIn('id', $kabupaten_ids);
        })->count();

        $desaTerkunjungi = $kunjungan->pluck('desa_id')->unique()->count();
        if ($totalDesa > 0) {
            $persentase = ($desaTerkunjungi / $totalDesa) * 100;
            $persentaseDesa = ($persentase == 100)
                ? 100
                : round($persentase, 3);
        } else {
            $persentaseDesa = 0;
        }

        // 3. Total Issue
        $totalIsu = $kunjungan->sum(function ($visit) {
            return $visit->issues->count();
        });

        // 4. Rata-rata kunjungan
        $rataRataKunjungan = round(
        $kunjungan->groupBy(fn($item) => Carbon::parse($item->date)->format('Y-m'))
                ->map->count()
                ->avg(),
        2
        );


        return $dataTable->render('pages.user.dashboard.index', compact([
            'project',
            'tahun',
            'dapil',
            'totalKunjungan',
            'desaTerkunjungi',
            'persentaseDesa',
            'totalIsu',
            'rataRataKunjungan'
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
