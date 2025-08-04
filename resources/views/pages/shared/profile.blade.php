@extends('layouts.base')

@section('title-head')
    <title>
        Profile - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('profile') }}">Profile</a></li>
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4 position-relative"
                style="background-image: url('{{ asset('assets-frontend/img/pattern.jpg') }}'); background-size: cover; background-position: center;"
                <span class="mask bg-gradient-dark opacity-6 position-absolute w-100 h-100"></span>

                <div class="position-absolute top-50 start-50 translate-middle z-index-2 text-center">
                    <img src="{{ asset('assets-frontend/img/ppp.png') }}" alt="Logo Partai PPP"
                        style="width: 100px; height: auto;">
                </div>
            </div>


            <div class="card card-body mx-2 mx-md-2 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('assets-frontend/img/harief.png') }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                H. Arief Maoshul Affandy
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                DPRD Provinsi (Jabar XIII)
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0">Informasi Profil</h6>
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <a href="javascript:;">
                                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit Profile"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <p class="text-sm">
                                        H. Arief Maoshul Affandy adalah seorang Anggota DPRD Provinsi Jawa Barat
                                        dari Daerah Pemilihan (Dapil) Jawa Barat XIII, yang meliputi Kabupaten
                                        Kuningan, Kabupaten Ciamis, Kota Banjar, dan Kabupaten Pangandaran. Ia
                                        merupakan kader dari Partai Persatuan Pembangunan (PPP) dan aktif
                                        menyuarakan aspirasi masyarakat di tingkat provinsi.
                                    </p>
                                    <hr class="horizontal gray-light">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                class="text-dark">Full Name:</strong> &nbsp; H. Arief Maoshul
                                            Affandy</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Mobile:</strong> &nbsp; (62) 81212121212</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Email:</strong> &nbsp; hajiarief@mail.com</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Location:</strong> &nbsp; Indonesia</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Admin Pengelola</h6>
                                </div>
                                <div class="card-body p-3">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                                            <div class="avatar me-3">
                                                <img src="{{ asset('assets-frontend/img/john.jpg') }}" alt="kal"
                                                    class="border-radius-lg shadow">
                                            </div>
                                            <div class="d-flex align-items-start flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Prabowo</h6>
                                                <p class="mb-0 text-xs">Administrator Web</p>
                                            </div>
                                            <a class="btn btn-link text-success pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                href="javascript:;">Admin</a>
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                                            <div class="avatar me-3">
                                                <img src="{{ asset('assets-frontend/img/john.jpg') }}" alt="kal"
                                                    class="border-radius-lg shadow">
                                            </div>
                                            <div class="d-flex align-items-start flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Luthfi Ahmad Fadilah</h6>
                                                <p class="mb-0 text-xs">Administrator Web</p>
                                            </div>
                                            <a class="btn btn-link text-success pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                href="javascript:;">Admin</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Tim Pemantau</h6>
                                </div>
                                <div class="card-body p-3">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                                            <div class="avatar me-3">
                                                <img src="{{ asset('assets-frontend/img/john.jpg') }}" alt="kal"
                                                    class="border-radius-lg shadow">
                                            </div>
                                            <div class="d-flex align-items-start flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Jengri Kurdiansyah</h6>
                                                <p class="mb-0 text-xs">Pemantau Kabupaten Kuningan</p>
                                            </div>
                                            <a class="btn btn-link text-warning pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                href="javascript:;">User</a>
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                            <div class="avatar me-3">
                                                <img src="{{ asset('assets-frontend/img/john.jpg') }}" alt="kal"
                                                    class="border-radius-lg shadow">
                                            </div>
                                            <div class="d-flex align-items-start flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Ridho Ahmadi</h6>
                                                <p class="mb-0 text-xs">Pemantau Kabupaten Banjar</p>
                                            </div>
                                            <a class="btn btn-link text-warning pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                href="javascript:;">User</a>
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                            <div class="avatar me-3">
                                                <img src="{{ asset('assets-frontend/img/john.jpg') }}" alt="kal"
                                                    class="border-radius-lg shadow">
                                            </div>
                                            <div class="d-flex align-items-start flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Kirun Supriyanto</h6>
                                                <p class="mb-0 text-xs">Pemantau Kabupaten Pangandaran</p>
                                            </div>
                                            <a class="btn btn-link text-warning pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                href="javascript:;">User</a>
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                            <div class="avatar me-3">
                                                <img src="{{ asset('assets-frontend/img/john.jpg') }}" alt="kal"
                                                    class="border-radius-lg shadow">
                                            </div>
                                            <div class="d-flex align-items-start flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Rizal Ramli</h6>
                                                <p class="mb-0 text-xs">Pemantau Kabupaten Ciamis</p>
                                            </div>
                                            <a class="btn btn-link text-warning pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                href="javascript:;">User</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
