<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Models\VisitPhoto;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class PhotoAktivitasController extends Controller
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
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            "visit_id" => "required|numeric|exists:visits,id",
            'photo' => 'required|file|image'
        ]);

        $data = Visit::findOrFail($request->visit_id);

        if ($request->hasFile('photo')) {
            $photoPath = $this->imageUploadService->uploadPhoto(
                $request->file('photo'),
                'photo/activity/', // Path untuk photo
                400
            );

            VisitPhoto::create([
                'visit_id' => $request->visit_id,
                'photo' => $photoPath,
            ]);
        }

        return redirect()->route('aktivitas.show', $data->uuid);
    }

    public function show(string $uuid)
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
