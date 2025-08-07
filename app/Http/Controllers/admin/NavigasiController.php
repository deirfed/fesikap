<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Dapil;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavigasiController extends Controller
{
    public function index()
    {
        $users = collect();
        $kabupaten_dapil = collect();
        $kunjungan = collect();

        $project = Auth::user()->project;
        if ($project != null) {
            $project_id = $project->id;
            $users = User::where('project_id', $project_id)->whereNot('role_id', 1)->get();
            $kunjungan = Visit::where('project_id', $project_id)->orderByDesc('date')->get();

            // Ambil semua relasi_dapil dari project ini
            $relasi_dapil = Dapil::where('project_id', $project->id)->with('relasi_dapil.kabupaten')->get()->pluck('relasi_dapil')->flatten();

            // Buat daftar semua kabupaten yang ada di relasi dapil
            $all_kabupaten = $relasi_dapil->mapWithKeys(function ($item) {
                return [
                    $item->kabupaten->id => (object) [
                        'kabupaten_id' => $item->kabupaten->id,
                        'kabupaten_name' => $item->kabupaten->name,
                        'kabupaten_type' => $item->kabupaten->type,
                        'kunjungan' => 0,
                    ],
                ];
            });

            // Ambil semua visit yang terkait project ini, dengan eager load relasi sampai kabupaten
            $visits = Visit::where('project_id', $project->id)
                ->with(['desa.kecamatan.kabupaten'])
                ->get();

            // === Grouping Kabupaten ===
            $kabupaten_summary = $visits->groupBy(fn($item) => $item->desa->kecamatan->kabupaten->id)
                ->map(function ($group, $kabupaten_id) {
                    $first = $group->first();
                    $kabupaten = $first->desa->kecamatan->kabupaten;
                    $kunjungan = $group->count();
                    return (object) [
                        'kabupaten_id' => $kabupaten_id,
                        'kabupaten_name' => $kabupaten->name,
                        'kabupaten_type' => $kabupaten->type,
                        'kunjungan' => $kunjungan,
                    ];
                });

            // Merge all_kabupaten (biar kabupaten kosong tetap muncul)
            $kabupaten_dapil = $all_kabupaten
                ->map(function ($item, $kabupaten_id) use ($kabupaten_summary) {
                    if ($kabupaten_summary->has($kabupaten_id)) {
                        $summary = $kabupaten_summary->get($kabupaten_id);
                        $item->kunjungan = $summary->kunjungan;
                    }

                    $item->kunjungan = number_format($item->kunjungan, 0, ',', '.');

                    return $item;
                })
                ->sortByDesc(fn($item) => (int) str_replace('.', '', $item->kunjungan))
                ->values();
        }

        return view('pages.admin.navigasi.index', compact([
            'project',
            'users',
            'kabupaten_dapil',
            'kunjungan',
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
