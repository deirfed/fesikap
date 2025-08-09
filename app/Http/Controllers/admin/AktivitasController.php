<?php

namespace App\Http\Controllers\admin;

use App\Exports\VisitExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dapil;
use App\Models\Desa;
use App\Models\RelasiDapil;
use App\Models\Visit;
use App\Models\VisitPhoto;
use App\Models\VisitType;
use App\Services\ImageUploadService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AktivitasController extends Controller
{
    protected $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $visit_types = VisitType::all();
        $categories = Category::all();

        $project = Auth::user()->project;
        $project_id = $project->id;
        $dapil = Dapil::where('project_id', $project_id)->first();
        $kabupaten_ids = RelasiDapil::where('dapil_id', $dapil->id)->pluck('kabupaten_id');
        $desa = Desa::whereHas('kecamatan.kabupaten', function ($query) use ($kabupaten_ids) {
                    $query->whereIn('id', $kabupaten_ids);
                })->get();

        return view('pages.admin.aktivitas.create', compact([
            'visit_types',
            'categories',
            'desa',
        ]));
    }

    public function store(Request $request)
    {
        $rawData = $request->validate([
            "visit_type_id" => "required|numeric|exists:visit_types,id",
            "desa_id" => "required|numeric|exists:desa,id",
            "address" => "required|string",
            "date" => "required|date",
            "name" => "required|string",
            "remark" => "nullable|string",
        ]);

        $request->validate([
            'photo' => 'nullable|file|image'
        ]);

        $project = Auth::user()->project;
        $project_id = $project->id;

        $rawData['project_id'] = $project_id;

        $data = Visit::updateOrCreate($rawData, $rawData);

        if ($request->hasFile('photo')) {
            $photoPath = $this->imageUploadService->uploadPhoto(
                $request->file('photo'),
                'photo/activity/', // Path untuk photo
                400
            );

            VisitPhoto::create([
                'visit_id' => $data->id,
                'photo' => $photoPath,
            ]);
        }

        return redirect()->route('aktivitas.show', $data->uuid);
    }

    public function show(string $uuid)
    {
        $kunjungan = Visit::where('uuid', $uuid)->firstOrFail();
        $categories = Category::all();
        return view('pages.admin.aktivitas.show', compact([
            'kunjungan',
            'categories',
        ]));
    }

    public function edit(string $id)
    {
        //
    }

    public function export(Request $request)
    {
        $request->validate([
            'kabupaten_id' => 'nullable|numeric',
            'kecamatan_id' => 'nullable|numeric',
            'desa_id' => 'nullable|numeric',
            'visit_type_id' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'type' => 'required|string',
        ]);

        $kabupaten_id = $request->kabupaten_id ?? null;
        $kecamatan_id = $request->kecamatan_id ?? null;
        $desa_id = $request->desa_id ?? null;
        $visit_type_id = $request->visit_type_id ?? null;
        $start_date = $request->start_date ?? null;
        $end_date = $request->end_date ?? $start_date;
        $type = $request->type ?? null;

        $project = Auth::user()->project;
        $project_id = $project->id;
        $dapil = Dapil::where('project_id', $project_id)->first();

        $query = Visit::where('project_id', $project_id);

        if($kabupaten_id != null)
        {
            $query->whereRelation('desa.kecamatan.kabupaten', 'id', '=', $kabupaten_id);
        }

        if($kecamatan_id != null)
        {
            $query->whereRelation('desa.kecamatan', 'id', '=', $kecamatan_id);
        }

        if($desa_id != null)
        {
            $query->where('desa_id', $desa_id);
        }

        if($visit_type_id != null)
        {
            $query->where('visit_type_id', $visit_type_id);
        }
        if($start_date != null && $end_date != null)
        {
            $query->whereBetween('date', [$start_date, $end_date]);
        }

        $data = $query->get();

        if ($type === 'excel') {
            return Excel::download(new VisitExport($data), 'data_aktivitas.xlsx');
        } elseif ($type === 'pdf') {
            $pdf = Pdf::loadView('pages.admin.aktivitas.pdf', [
                        'aktivitas' => $data,
                        'project' => $project,
                        'dapil' => $dapil,
                    ]);
            return $pdf->setPaper('a4', 'potrait')->stream('data_aktivitas.pdf');
        }
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
