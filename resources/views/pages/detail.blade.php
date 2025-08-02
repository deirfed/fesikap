@extends('layouts.base')

@section('title-head')
    <title>
        Detail Aktivitas - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{ route('detail') }}">Detali Aktivitas</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid py-2 ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Detail Aktivitas</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <div class="list-group">
                            <div class="list-group-item border-0 d-flex flex-column p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex justify-content-between align-items-start flex-wrap">
                                    <div>
                                        <h6 class="mb-3 text-lg">Kunjungan Desa Sindang Agung 26 Juli 2025</h6>
                                        <span class="mb-2 text-sm d-block">Nama Desa:
                                            <span class="text-dark font-weight-bold ms-sm-2">Desa Sindang Agung</span>
                                        </span>
                                        <span class="mb-2 text-sm d-block">Kecamatan:
                                            <span class="text-dark font-weight-bold ms-sm-2">Kecamatan Sindang Agung</span>
                                        </span>
                                        <span class="mb-2 text-sm d-block">Dapil Provinsi:
                                            <span class="text-dark font-weight-bold ms-sm-2">Dapil 5 Kuningan</span>
                                        </span>
                                        <span class="mb-2 text-sm d-block">Kabupaten:
                                            <span class="text-dark font-weight-bold ms-sm-2">Kuningan</span>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge badge-sm bg-gradient-success mb-1">Ekonomi</span>
                                        <span class="badge badge-sm bg-gradient-success mb-1">Pendidikan</span>
                                        <span class="badge badge-sm bg-gradient-success mb-1">Sosial</span>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label for="catatan" class="form-label text-xs">Catatan Kunjungan</label>
                                    <textarea class="form-control border px-3" id="catatan" rows="4" disabled style="width: 100%;">Kunjungan berjalan lancar. Warga menyampaikan aspirasi terkait akses jalan desa dan program pelatihan UMKM.</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5 mt-4">
                <div class="card h-100">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Dokumentasi</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <div id="fotoSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                            <div class="carousel-inner rounded shadow-sm" style="max-height: 200px;">
                                <!-- Slide 1 -->
                                <div class="carousel-item active">
                                    <div class="row g-2">
                                        <div class="col-6 d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets-frontend/img/john.jpg') }}"
                                                class="img-fluid object-fit-contain rounded zoomable-img"
                                                style="max-height: 200px; cursor: pointer;" data-bs-toggle="modal"
                                                data-bs-target="#zoomModal"
                                                data-img="{{ asset('assets-frontend/img/john.jpg') }}">
                                        </div>
                                        <div class="col-6 d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets-frontend/img/harief.png') }}"
                                                class="img-fluid object-fit-contain rounded zoomable-img"
                                                style="max-height: 200px; cursor: pointer;" data-bs-toggle="modal"
                                                data-bs-target="#zoomModal"
                                                data-img="{{ asset('assets-frontend/img/harief.png') }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Slide 2 -->
                                <div class="carousel-item">
                                    <div class="row g-2">
                                        <div class="col-6 d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets-frontend/img/pattern.jpg') }}"
                                                class="img-fluid object-fit-contain rounded zoomable-img"
                                                style="max-height: 200px; cursor: pointer;" data-bs-toggle="modal"
                                                data-bs-target="#zoomModal"
                                                data-img="{{ asset('assets-frontend/img/pattern.jpg') }}">
                                        </div>
                                        <div class="col-6 d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets-frontend/img/ppp.png') }}"
                                                class="img-fluid object-fit-contain rounded zoomable-img"
                                                style="max-height: 200px; cursor: pointer;" data-bs-toggle="modal"
                                                data-bs-target="#zoomModal"
                                                data-img="{{ asset('assets-frontend/img/ppp.png') }}">
                                        </div>
                                    </div>
                                </div>
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
    </div>

    <div class="modal fade" id="zoomModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body p-0">
                    <img id="zoomImage" src="" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        const zoomableImages = document.querySelectorAll('.zoomable-img');
        const zoomImage = document.getElementById('zoomImage');

        zoomableImages.forEach(img => {
            img.addEventListener('click', () => {
                const src = img.getAttribute('data-img');
                zoomImage.setAttribute('src', src);
            });
        });
    </script>
@endsection
