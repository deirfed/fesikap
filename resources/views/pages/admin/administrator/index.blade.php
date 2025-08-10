@extends('layouts.base')

@section('title-head')
    <title>
        Admin - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <x-breadcrumb :items="[
        ['label' => 'Menu', 'route' => route('menu.index')],
        ['label' => 'Halaman Admin', 'route' => route('administrator.index')],
    ]" />
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
                                        <p class="text-sm mb-0 text-capitalize">{{ $item->kabupaten_type ?? null }}
                                            {{ $item->kabupaten_name ?? '-' }}</p>
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
                        <div class="d-flex justify-content-between align-items-center px-4 pb-2">
                            <h6 class="mb-0">Tabel Kunjungan</h6>
                            <div class="d-flex gap-2">
                                <a href="{{ route('aktivitas.create') }}"><button class="btn btn-sm btn-primary"
                                        data-toggle="tooltip" title="Add New Activity">
                                        <i class="fas fa-plus me-1"></i> Tambah Data
                                    </button></a>
                                <button class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#filterModal" title="Filter Data">
                                    <i class="fas fa-filter me-1"></i> Filter
                                </button>
                                <button class="btn btn-sm btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exportModal">
                                        <i class="fas fa-file-export me-1"></i> Export
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive p-2">
                            {{ $dataTable->table([
                                'class' => 'table table-bordered table-striped table-vcenter table-sm fs-sm text-nowrap align-middle',
                            ]) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Modal -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('administrator.index') }}" method="GET">
                @method('GET')
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filterModalLabel">Filter Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        @livewire('filter-lokasi', [
                            'prefix' => '',
                            'kabupaten_id' => old('kabupaten_id', $kabupaten_id),
                            'kecamatan_id' => old('kecamatan_id', $kecamatan_id),
                            'desa_id' => old('desa_id', $desa_id),
                        ])
                        <div class="mb-3">
                            <label class="form-label" for="dokter_id">Tanggal</label>
                            <div class="row align-items-center g-2">
                                <div class="col">
                                    <input class="form-control border border-dark px-3" type="date" name="start_date"
                                        value="{{ $start_date }}">
                                </div>
                                <div class="col-auto">
                                    <span class="form-text">s/d</span>
                                </div>
                                <div class="col">
                                    <input class="form-control border border-dark px-3" type="date" name="end_date"
                                        value="{{ $end_date }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="visit_type_id" class="form-label">Jenis Kunjungan</label>
                            <select name="visit_type_id" id="visit_type_id" class="form-select">
                                <option value="" selected disabled>Pilih Jenis Kunjungan</option>
                                @foreach ($visit_type as $item)
                                    <option value="{{ $item->id }}" @selected($item->id == $visit_type_id)>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('administrator.index') }}" class="btn btn-primary">Reset</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Terapkan Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Filter Modal -->

    <!-- Export Modal -->
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('aktivitas.export') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exportModalLabel">Export Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="kabupaten_id" value="{{ $kabupaten_id ?? null }}">
                        <input type="hidden" name="kecamatan_id" value="{{ $kecamatan_id ?? null }}">
                        <input type="hidden" name="desa_id" value="{{ $desa_id ?? null }}">
                        <input type="hidden" name="visit_type_id" value="{{ $visit_type_id ?? null }}">
                        <input type="hidden" name="start_date" value="{{ $start_date ?? null }}">
                        <input type="hidden" name="end_date" value="{{ $end_date ?? null }}">
                        <div class="mb-3">
                            <label for="type" class="form-label">Pilih Format Export</label>
                            <select class="form-select border border-dark p-2" id="type" name="type" required>
                                <option value="" selected disabled>-- Pilih format --</option>
                                <option value="excel">Excel (.xlsx)</option>
                                <option value="pdf">PDF (.pdf)</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Export Sekarang</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Export Modal -->
@endsection

@push('javascript')
    @include('components.datatables')
@endpush
