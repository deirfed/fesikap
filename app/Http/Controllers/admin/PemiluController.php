<?php

namespace App\Http\Controllers\admin;

use App\DataTables\PemiluDataTable;
use App\Http\Controllers\Controller;
use App\Models\Dapil;
use App\Models\Desa;
use App\Models\Election;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\RelasiDapil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemiluController extends Controller
{
    public function index(PemiluDataTable $dataTable, Request $request)
    {
        $kabupaten_id = $request->kabupaten_id ?? null;
        $kecamatan_id = $request->kecamatan_id ?? null;
        $desa_id = $request->desa_id ?? null;

        $project = Auth::user()->project;
        $dapil = Dapil::where('project_id', $project->id)->first();

        $kabupaten_ids = RelasiDapil::where('dapil_id', $dapil->id)->pluck('kabupaten_id');

        $kabupaten = Kabupaten::whereIn('id', $kabupaten_ids)->get();

        $kecamatan = Kecamatan::whereHas('kabupaten', function ($query) use ($kabupaten_ids) {
                $query->whereIn('id', $kabupaten_ids);
            })->get();

        $desa = Desa::whereHas('kecamatan.kabupaten', function ($query) use ($kabupaten_ids) {
                $query->whereIn('id', $kabupaten_ids);
            })->get();

        return $dataTable->with([
            'kabupaten_id' => $kabupaten_id,
            'kecamatan_id' => $kecamatan_id,
            'desa_id' => $desa_id,
        ])->render('pages.admin.pemilu.index', compact([
            'project',
            'dapil',
            'kabupaten',
            'kecamatan',
            'desa',
            'kabupaten_id',
            'kecamatan_id',
            'desa_id',
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
