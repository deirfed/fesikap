<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use App\Models\IssuePhoto;
use App\Models\Visit;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class IsuController extends Controller
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
        $rawData = $request->validate([
            "visit_id" => "required|numeric|exists:visits,id",
            "category_id" => "required|numeric|exists:categories,id",
            "name" => "required|string",
        ]);

        $request->validate([
            'photo' => 'nullable|file|image'
        ]);

        $kunjungan = Visit::findOrFail($request->visit_id);

        $data = Issue::updateOrCreate($rawData, $rawData);


        if ($request->hasFile('photo')) {
            $photoPath = $this->imageUploadService->uploadPhoto(
                $request->file('photo'),
                'photo/issue/', // Path untuk photo
                400
            );

            IssuePhoto::create([
                'issue_id' => $data->id,
                'photo' => $photoPath,
            ]);
        }

        return redirect()->route('aktivitas.show', $kunjungan->uuid);
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
