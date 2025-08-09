<?php

namespace App\Http\Controllers\admin;

use App\DataTables\PemiluDataTable;
use App\Exports\ElectionExport;
use App\Http\Controllers\Controller;
use App\Models\Dapil;
use App\Models\Desa;
use App\Models\Election;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\RelasiDapil;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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

    public function export(Request $request)
    {
        $request->validate([
            'kabupaten_id' => 'nullable|numeric',
            'kecamatan_id' => 'nullable|numeric',
            'desa_id' => 'nullable|numeric',
            'type' => 'required|string',
        ]);

        $kabupaten_id = $request->kabupaten_id ?? null;
        $kecamatan_id = $request->kecamatan_id ?? null;
        $desa_id = $request->desa_id ?? null;
        $type = $request->type ?? null;

        $project = Auth::user()->project;
        $project_id = $project->id;
        $dapil = Dapil::where('project_id', $project_id)->first();

        $query = Election::whereRelation('tps.dapil.project', 'id', '=', $project_id);

        if($kabupaten_id != null)
        {
            $query->whereRelation('tps.desa.kecamatan.kabupaten', 'id', '=', $kabupaten_id);
        }

        if($kecamatan_id != null)
        {
            $query->whereRelation('tps.desa.kecamatan', 'id', '=', $kecamatan_id);
        }

        if($desa_id != null)
        {
            $query->whereRelation('tps.desa', 'id', '=', $desa_id);
        }

        $data = $query->get();

        if ($type === 'excel') {
            return Excel::download(new ElectionExport($data), 'data_hasil_pemilu.xlsx');
        } elseif ($type === 'pdf') {
            $pdf = Pdf::loadView('pages.admin.pemilu.pdf', [
                        'election' => $data,
                        'project' => $project,
                        'dapil' => $dapil,
                    ]);
            return $pdf->setPaper('a4', 'landscape')->stream('data_hasil_pemilu.pdf');
        }
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
