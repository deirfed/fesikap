<?php

namespace App\Http\Controllers\admin;

use App\DataTables\AktivitasDataTable;
use App\Models\User;
use App\Models\Dapil;
use App\Models\Visit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\RelasiDapil;
use App\Models\VisitType;
use Illuminate\Support\Facades\Auth;

class AdministratorController extends Controller
{
    public function index(AktivitasDataTable $dataTable, Request $request)
    {
        $kabupaten_id = $request->kabupaten_id ?? null;
        $kecamatan_id = $request->kecamatan_id ?? null;
        $desa_id = $request->desa_id ?? null;
        $visit_type_id = $request->visit_type_id ?? null;
        $start_date = $request->start_date ?? null;
        $end_date = $request->end_date ?? $start_date;

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

        $dapil = Dapil::where('project_id', $project->id)->first();

        $kabupaten_ids = RelasiDapil::where('dapil_id', $dapil->id)->pluck('kabupaten_id');

        $kabupaten = Kabupaten::whereIn('id', $kabupaten_ids)->get();

        $kecamatan = Kecamatan::whereHas('kabupaten', function ($query) use ($kabupaten_ids) {
                $query->whereIn('id', $kabupaten_ids);
            })->get();

        $desa = Desa::whereHas('kecamatan.kabupaten', function ($query) use ($kabupaten_ids) {
                $query->whereIn('id', $kabupaten_ids);
            })->get();

        $visit_type = VisitType::all();

        return $dataTable->with([
            'kabupaten_id' => $kabupaten_id,
            'kecamatan_id' => $kecamatan_id,
            'desa_id' => $desa_id,
            'visit_type_id' => $visit_type_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ])->render('pages.admin.administrator.index', compact([
            'project',
            'users',
            'kabupaten_dapil',
            'kunjungan',
            'kabupaten',
            'kecamatan',
            'desa',
            'visit_type',
            'kabupaten_id',
            'kecamatan_id',
            'desa_id',
            'visit_type_id',
            'start_date',
            'end_date',
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
