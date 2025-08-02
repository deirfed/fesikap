@extends('layouts.base')

@section('title-head')
    <title>
        Admin - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('admin') }}">Admin</a></li>
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Kabupaten Kuningan</p>
                                <h4 class="mb-0">356</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">check</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3 d-flex justify-content-between align-items-center">
                        <p class="mb-0 text-sm">
                            Kunjungan
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <div class="d-flex align-items-center gap-2">
                                        <p class="text-sm mb-0 text-capitalize">Kabupaten Banjar</p>
                                    </div>
                                </div>
                                <h4 class="mb-0">150</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">check</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3 d-flex justify-content-between align-items-center">
                        <p class="mb-0 text-sm">
                            Kunjungan
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Kabupaten Ciamis</p>
                                <h4 class="mb-0">124</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">check</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3 d-flex justify-content-between align-items-center">
                        <p class="mb-0 text-sm">
                            Kunjungan
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Kabupaten Pangandaran</p>
                                <h4 class="mb-0">102</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">check</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3 d-flex justify-content-between align-items-center">
                        <p class="mb-0 text-sm">
                            Kunjungan
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-dark border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Data Kunjungan</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">

                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between align-items-center px-4 pb-3">
                            <h6 class="mb-0">Tabel Kunjungan</h6>
                            <div class="d-flex gap-2">
                                <a href="{{ route('form') }}"><button class="btn btn-sm btn-primary" data-toggle="tooltip"
                                        title="Add New Activity">
                                        <i class="fas fa-plus me-1"></i> Add
                                    </button></a>
                                <a href=""><button class="btn btn-sm btn-secondary" data-toggle="tooltip"
                                        title="Filter Data">
                                        <i class="fas fa-filter me-1"></i> Filter
                                    </button></a>
                                <a href=""><button class="btn btn-sm btn-success" data-toggle="tooltip"
                                        title="Export Data">
                                        <i class="fas fa-file-export me-1"></i> Export
                                    </button></a>
                            </div>
                        </div>

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            No.
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Desa
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Kunjungan
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
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">1</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">Sindang Agung</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">Ekonomi</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">Free Text</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('detail') }}"
                                                class="badge bg-success text-white text-decoration-none"
                                                data-toggle="tooltip" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="javascript:;" class="badge bg-dark text-white text-decoration-none"
                                                data-toggle="tooltip" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="javascript:;" class="badge bg-danger text-white text-decoration-none"
                                                data-toggle="tooltip" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">1</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">Cilimus</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">Ekonomi</span>
                                            <span class="badge badge-sm bg-gradient-success">Sosial</span>
                                            <span class="badge badge-sm bg-gradient-success">Keagamaan</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">Free Text</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="javascript:;"
                                                class="badge bg-success text-white text-decoration-none"
                                                data-toggle="tooltip" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="javascript:;" class="badge bg-dark text-white text-decoration-none"
                                                data-toggle="tooltip" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="javascript:;" class="badge bg-danger text-white text-decoration-none"
                                                data-toggle="tooltip" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
