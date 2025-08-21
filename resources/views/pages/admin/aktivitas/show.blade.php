@extends('layouts.base')

@section('title-head')
    <title>
        Detail Aktivitas - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <x-breadcrumb :items="[
        ['label' => 'Menu', 'route' => route('menu.index')],
        ['label' => 'Halaman Admin', 'route' => route('administrator.index')],
        ['label' => 'Detail Aktivitas'],
    ]" />
@endsection

@push('javascript')
    @vite('resources/js/helper.js')
@endpush

@section('content')
    <div class="container-fluid py-2 ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Detail Aktivitas</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <div class="list-group">
                            <div class="list-group-item border-0 d-flex flex-column p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex justify-content-between align-items-start flex-wrap">
                                    <div>
                                        <h6 class="mb-3 text-lg">Kunjungan Desa {{ $kunjungan->desa->name ?? 'N/A' }}
                                            {{ $kunjungan->date ? \Carbon\Carbon::parse($kunjungan->date)->isoFormat('D MMMM Y') : 'N/A' }}
                                        </h6>
                                        <span class="mb-2 text-sm d-block">Nama Desa:
                                            <span class="text-dark font-weight-bold ms-sm-2">Desa
                                                {{ $kunjungan->desa->name ?? 'N/A' }}</span>
                                        </span>
                                        <span class="mb-2 text-sm d-block">Kecamatan:
                                            <span class="text-dark font-weight-bold ms-sm-2">Kecamatan
                                                {{ $kunjungan->desa->kecamatan->name ?? 'N/A' }}</span>
                                        </span>
                                        <span class="mb-2 text-sm d-block">Jenis Kunjungan:
                                            <span
                                                class="text-dark font-weight-bold ms-sm-2 badge rounded-pill bg-success">{{ $kunjungan->visit_type->name ?? 'N/A' }}</span>
                                        </span>
                                        <span
                                            class="mb-2
                                                text-sm d-block">Kabupaten/Kota:
                                            <span
                                                class="text-dark font-weight-bold ms-sm-2">{{ $kunjungan->desa->kecamatan->kabupaten->name ?? 'N/A' }}</span>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        @foreach ($kunjungan->issues->unique('category_id') as $item)
                                            <span
                                                class="badge badge-sm bg-gradient-success mb-1">{{ $item->category->name ?? 'N/A' }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <label for="name" class="form-label text-xs">Hasil Kunjungan</label>
                                    <textarea class="form-control border px-3" id="name" rows="2" disabled style="width: 100%;">{{ $kunjungan->name }}</textarea>
                                </div>
                                <div class="mt-1">
                                    <label for="remark" class="form-label text-xs">Catatan Kunjungan</label>
                                    <textarea class="form-control border px-3" id="remark" rows="2" disabled style="width: 100%;">{{ $kunjungan->remark }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4">
                <div class="card h-100">
                    <div class="card-header pb-0 px-3">
                        <div class="d-flex justify-content-between align-items-center px-4">
                            <h6 class="mb-0">Dokumentasi Aktivitas</h6>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-primary" data-toggle="tooltip" title="Add New Issue"
                                    data-bs-toggle="modal" data-bs-target="#addPhotoVisitModal">
                                    <i class="fas fa-plus me-1"></i> Tambah Photo
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0 d-flex justify-content-center align-items-center" style="min-height: 300px;">
                        <div id="fotoSlider" class="carousel slide w-100 px-3" data-bs-ride="carousel"
                            data-bs-interval="4000">
                            <div class="carousel-inner rounded shadow-sm">
                                @foreach ($kunjungan->visit_photos as $item)
                                    <div class="carousel-item active">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-6 d-flex justify-content-center align-items-center">
                                                <img src="{{ asset('storage/' . $item->photo) }}"
                                                    class="img-fluid object-fit-contain rounded zoomable-img"
                                                    style="max-height: 800px; cursor: pointer;" data-bs-toggle="modal"
                                                    data-bs-target="#zoomModal" data-img="{{ asset('storage/', $item->photo) }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#fotoSlider"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#fotoSlider"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between align-items-center px-4">
                        <h6 class="mb-0">Detail Isu</h6>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-primary" data-toggle="tooltip" title="Add New Issue"
                                data-bs-toggle="modal" data-bs-target="#addIssueModal">
                                <i class="fas fa-plus me-1"></i> Tambah Isu
                            </button>
                        </div>
                    </div>
                    <!-- End Tombol Aksi -->
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="list-group">
                        <div class="list-group-item border-0 d-flex flex-column p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div>
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                    No.
                                                </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Isu / Aspirasi
                                                </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Catatan
                                                </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kunjungan->issues as $item)
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span
                                                            class="badge badge-sm bg-gradient-success">{{ $item->category->name ?? 'N/A' }}</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $item->name ?? 'N/A' }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <a href="javascript:;"
                                                            class="badge bg-success text-white text-decoration-none"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                            title="View">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="javascript:;"
                                                            class="badge bg-dark text-white text-decoration-none"
                                                            data-toggle="tooltip" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="javascript:;"
                                                            class="badge bg-danger text-white text-decoration-none"
                                                            data-toggle="tooltip" title="Delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Zoom -->
        <div class="modal fade" id="zoomModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-transparent border-0">
                    <div class="modal-body p-0">
                        <img id="zoomImage" src="" class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Zoom -->

        <!-- Modal Detail Issue -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Isu</h5>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Detail Issue -->

        <!-- Modal Add Issue -->
        <div class="modal fade" id="addIssueModal" tabindex="-1" aria-labelledby="addIssueModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('isu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addIssueModalLabel">Tambah Data Isu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="visit_id" value="{{ $kunjungan->id }}">
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Kategori Isu<small
                                        class="text-muted"></small></label>
                                <select class="form-select border border-dark px-3" id="category_id" name="category_id"
                                    required>
                                    <option value="" selected>-- Pilih Kategori Isu --</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Detail Isu</label>
                                <textarea class="form-control border border-dark px-3" id="name" name="name" rows="4"
                                    placeholder="Detail isu" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Dokumentasi (Photo)</label>
                                <input type="file" class="form-control border border-dark px-3" id="photo"
                                    name="photo" accept="image/*">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Modal Add Issue -->

        <!-- Add Photo Visit Modal -->
        <div class="modal fade" id="addPhotoVisitModal" tabindex="-1" aria-labelledby="addPhotoVisitLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('photo-aktivitas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPhotoVisitLabel">Tambah Photo Aktivitas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="visit_id" value="{{ $kunjungan->id }}">
                            <div class="mb-3">
                                <label for="photo" class="form-label">Dokumentasi (Photo)</label>
                                <input type="file" class="form-control border border-dark px-3" id="photo"
                                    name="photo" accept="image/*" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Add Photo Visit Modal Add Issue -->
    @endsection
