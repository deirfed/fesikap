<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use App\Models\RequestType;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RequestController extends Controller
{
    protected $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

    public function index(Request $request)
    {
        //
    }

    public function create()
    {
        $request_types = RequestType::all();
        return view('pages.admin.request.index', compact([
            'request_types',
        ]));
    }

    public function store(Request $request)
    {
        $rawData = $request->validate([
            "request_type_id" => "required|numeric|exists:request_types,id",
            "date" => "required|date",
            "description" => "required|string",
        ]);

        $request->validate([
            'photo' => 'nullable|file|image'
        ]);

        $rawData['ticket'] = ModelsRequest::generateTicket($request->request_type_id);
        $rawData['user_id'] = Auth::user()->id;
        $rawData['status_id'] = 2;

        $data = ModelsRequest::updateOrCreate($rawData, $rawData);

        if ($request->hasFile('photo')) {
            $photoPath = $this->imageUploadService->uploadPhoto(
                $request->file('photo'),
                'photo/request/', // Path untuk photo
                600
            );

            // Hapus file lama
            if ($data->photo) {
                Storage::delete($data->photo);
            }

            // Update path photo di database
            $data->update(['photo' => $photoPath]);
        }

        return redirect()->route('administrator.index')->with('success', 'Data berhasil ditambahkan');
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
