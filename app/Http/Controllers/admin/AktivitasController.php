<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dapil;
use App\Models\Desa;
use App\Models\RelasiDapil;
use App\Models\Visit;
use App\Models\VisitPhoto;
use App\Models\VisitType;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
