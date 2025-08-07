@extends('layouts.base')

@section('title-head')
    <title>
        Admin - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('navigasi.index') }}">Admin</a></li>
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="ms-3">
                <h3 class="mb-0 h4 font-weight-bolder">Halaman Admin</h3>
                <p class="mb-4">
                    Sistem Kelola Aspirasi Publik
                </p>
            </div>
            <div class="col-xl-12 mt-4">
                <div class="row">
                    <div class="col-md-3 col-6 mb-4">
                        <a href="{{ route('user.index') }}">
                            <div class="card">
                                <div class="card-header mx-4 p-3 text-center">
                                    <div
                                        class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                                        <i class="material-symbols-rounded opacity-10">admin_panel_settings</i>
                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">Kelola User / Pengguna</h6>
                                    <hr class="horizontal dark my-3">
                                    <h5 class="mb-0">{{ $users->count() }} Pengguna Aktif</h5>
                                    <span class="text-xs">Pengaturan User</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 mb-4">
                        <a href="{{ route('pemilu.index') }}">
                            <div class="card">
                                <div class="card-header mx-4 p-3 text-center">
                                    <div
                                        class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                                        <i class="material-symbols-rounded opacity-10">sell</i>
                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">Data Hasil Pemilu</h6>
                                    <hr class="horizontal dark my-3">
                                    <h5 class="mb-0">File RAW Excel</h5>
                                    <span class="text-xs">Lihat / Download Data Hasil Pemilu</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 mb-4">
                        <a href="{{ route('profile.index') }}">
                            <div class="card">
                                <div class="card-header mx-4 p-3 text-center">
                                    <div
                                        class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                                        <i class="material-symbols-rounded opacity-10">account_circle</i>
                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">Informasi Profile</h6>
                                    <hr class="horizontal dark my-3">
                                    <h5 class="mb-0">{{ $project->profile->nama_lengkap ?? 'N/A' }}</h5>
                                    <span class="text-xs">Detail Informasi Profile</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 mb-4">
                        <a href="{{ route('request.create') }}">
                            <div class="card">
                                <div class="card-header mx-4 p-3 text-center">
                                    <div
                                        class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                                        <i class="material-symbols-rounded opacity-10">markunread_mailbox</i>
                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">Request Fitur / Keluhan</h6>
                                    <hr class="horizontal dark my-3">
                                    <h5 class="mb-0">Submit Request</h5>
                                    <span class="text-xs">Request Fitur / Keluhan</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @if ($kabupaten_dapil != null)
                @foreach ($kabupaten_dapil as $item)
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-capitalize">{{ $item->kabupaten_type ?? null }} {{ $item->kabupaten_name ?? '-' }}</p>
                                        <h4 class="mb-0">{{ $item->kunjungan ?? 0 }}</h4>
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
                @endforeach
            @endif
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
                                <a href="{{ route('aktivitas.create') }}"><button class="btn btn-sm btn-primary"
                                        data-toggle="tooltip" title="Add New Activity">
                                        <i class="fas fa-plus me-1"></i> Tambah Data
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
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Kunjungan
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jenis Kunjungan
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Desa
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kunjungan as $data)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xxs font-weight-bold">{{ $loop->iteration }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xxs font-weight-bold">{{ $data->date }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="badge rounded-pill text-xxs font-weight-bold
                                                    @switch($data->visit_type_id)
                                                    @case(1) bg-primary @break
                                                    @case(2) bg-success @break
                                                    @case(3) bg-warning text-dark @break
                                                    @default bg-secondary
                                                    @endswitch
                                                ">
                                                    {{ $data->visit_type->name ?? 'N/A' }}
                                                </span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xxs font-weight-bold">{{ $data->desa->name ?? 'N/A' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('aktivitas.show', $data->uuid) }}"
                                                    class="badge bg-success text-white text-decoration-none"
                                                    data-toggle="tooltip" title="View">
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
@endsection
