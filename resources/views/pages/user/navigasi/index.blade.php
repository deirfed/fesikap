@extends('layouts.base')

@section('title-head')
    <title>
        Menu - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <x-breadcrumb :items="[['label' => 'Menu', 'route' => route('menu.index')]]" />
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class=" d-flex justify-content-center">
            <div class="text-center">
                <div class="ms-3">
                    <h5 class="mb-1">Halo, {{ auth()->user()->name }}!</h5>
                    <p class="mb-2 text-muted">Selamat datang di <strong>SIKAP</strong> <br> (Sistem Kelola Aspirasi Publik)</p>

                    <h3 class="mb-0 h4 font-weight-bolder mb-2">Menu Utama</h3>
                </div>
            </div>
        </div>
        <div class="container-fluid py-2 d-flex justify-content-center">
            <div class="row mx-4">
                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('dashboard.index') }}" class="text-decoration-none text-dark">
                            <div class="card-header mx-4 p-3 text-center">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">dashboard</i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Dashboard</h6>
                                <hr class="horizontal dark my-3">
                                <h5 class="mb-0">Dashboard Informasi</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        @if (in_array(auth()->user()->role_id, [1, 2]))
                            <a href="{{ route('administrator.index') }}" class="text-decoration-none text-dark">
                            @else
                                <a href="javascript:void(0);" class="text-decoration-none text-dark" data-bs-toggle="modal"
                                    data-bs-target="#unauthorizedModal">
                        @endif

                        <div class="card-header mx-4 p-3 text-center">
                            <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">settings</i>
                            </div>
                        </div>
                        <div class="card-body pt-0 p-3 text-center">
                            <h6 class="text-center mb-0">Halaman Admin</h6>
                            <hr class="horizontal dark my-3">
                            <h5 class="mb-0">Halaman Administrator</h5>
                        </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('informasi.index') }}" class="text-decoration-none text-dark">
                            <div class="card-header mx-4 p-3 text-center">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">info</i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Informasi</h6>
                                <hr class="horizontal dark my-3">
                                <h5 class="mb-0">Informasi Website</h5>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('pemilu.index') }}" class="text-decoration-none text-dark">
                            <div class="card-header mx-4 p-3 text-center">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">download</i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Data Pemilu</h6>
                                <hr class="horizontal dark my-3">
                                <h5 class="mb-0">Data Pemilu 2025</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="unauthorizedModal" tabindex="-1" aria-labelledby="unauthorizedModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg border-0">
                <div class="modal-header bg-gradient-warning text-white">
                    <h5 class="modal-title fw-bold" id="unauthorizedModalLabel">
                        <i class="material-symbols-rounded me-2">lock</i> Maaf, Akses Ditolak
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Tutup"></button>
                </div>
                <div class="modal-body py-4">
                    <p class="mb-0 fs-6">
                        Anda <strong>tidak memiliki izin</strong> untuk mengakses Halaman Administrator.
                        Silakan hubungi administrator untuk informasi lebih lanjut.
                    </p>
                </div>
                <div class="modal-footer justify-content-center border-top-0">
                    <button type="button" class="btn btn-outline-warning px-4" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
