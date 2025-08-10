@extends('layouts.base')

@section('title-head')
    <title>
        Dashboard - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <x-breadcrumb :items="[
        ['label' => 'Menu', 'route' => route('menu.index')],
        ['label' => 'Dashboard', 'route' => route('dashboard.index')],
    ]" />
@endsection

@push('javascript')
    @vite('resources/js/dashboardCekKunjungan.js')
    @vite('resources/js/dashboardCekSuaraFromSVG.js')
    @vite('resources/js/dashboardJumlahAspirasi.js')
    @vite('resources/js/dashboardTotalKunjungan.js')
    @vite('resources/js/dashboardShowSuara.js')
@endpush

@section('content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="ms-3">
                <h3 class="mb-0 h4 font-weight-bolder">SIKAP</h3>
                <p class="mb-4">
                    Sistem Kelola Aspirasi Publik
                </p>
            </div>
            <div class="col-xl-6 mb-xl-0 mb-4">
                <div class="card bg-transparent shadow-xl">
                    <div class="overflow-hidden position-relative border-radius-xl">
                        <img src="{{ asset('assets-frontend/img/pattern.jpg') }}"
                            class="position-absolute opacity-2 start-0 top-0 w-100 z-index-1 h-100" alt="pattern-tree">
                        <span class="mask bg-gradient-success opacity-10"></span>
                        <div class="card-body position-relative z-index-1 p-3">
                            <h5 class="text-white mt-4 mb-5 pb-2">
                                {{ $project->profile->nama_lengkap ?? null }}
                            </h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-4">
                                    <p class="text-white text-sm opacity-8 mb-0">Wilayah Dapil</p>
                                    <h6 class="text-white mb-0">{{ $dapil->name ?? 'N/A' }}</h6>
                                </div>
                                <div>
                                    <p class="text-white text-sm opacity-8 mb-0">Menjabat Sejak</p>
                                    <h6 class="text-white mb-0">
                                        {{ $project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') : 'N/A' }}
                                    </h6>
                                </div>
                                <div class="mx-3 text-center">
                                    <img src="{{ env('APP_CMS_URL') }}/storage/{{ $project->profile->photo ?? 'N/A' }}"
                                        alt="photo_profile"
                                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%; border: 2px solid #fff;">
                                </div>
                                <div style="max-width: 60px; width: 100%; overflow: hidden;">
                                    <img src="{{ env('APP_CMS_URL') }}/storage/{{ $project->party->logo ?? 'N/A' }}"
                                        alt="logo_partai"
                                        style="width: 100%; height: auto; display: block; object-fit: contain;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-4">
                <div class="row">
                    <div class="col-md-6 col-6">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">progress_activity</i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Masa Menjabat</h6>
                                <hr class="horizontal dark my-3">
                                <h5 class="mb-0">{{ $project->masa_jabatan ?? 'N/A' }} Hari</h5>
                                <span class="text-xs">Terhitung Sejak Menjabat</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">quick_reference_all</i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Periode Menjabat</h6>
                                <hr class="horizontal dark my-3">
                                <h5 class="mb-0">{{ $project->periode->name ?? 'N/A' }}</h5>
                                <span class="text-xs"> {{ $project->party->name ?? 'N/A' }}
                                    ({{ $project->party->code ?? 'N/A' }})</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $kabupatens = collect();
                if ($project && $project->dapils) {
                    foreach ($project->dapils as $item) {
                        foreach ($item->relasi_dapil as $i) {
                            if ($i->kabupaten) {
                                $kabupatens->push($i->kabupaten);
                            }
                        }
                    }
                }
                $dapilKabupatens = $kabupatens->unique('id')->values();
            @endphp
            <div class="col-12 mb-4">
                <div class="card shadow border">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0 text-white">
                            Cek Status Kunjungan
                            {{ $project->profile->nama_lengkap ?? null }}
                        </h4>
                        <small>Wilayah:
                            {{ $dapilKabupatens->pluck('name')->implode(', ') ?: 'N/A' }}
                        </small>
                    </div>
                    <div class="card-body">
                        @livewire('cek-status-aktivitas', [
                            'prefix' => '',
                            'kabupaten_id' => old('kabupaten_id'),
                            'kecamatan_id' => old('kecamatan_id'),
                            'desa_id' => old('desa_id'),
                        ])
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="card shadow border">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0 text-white">Cek Suara Terbanyak
                            {{ $project->profile->nama_lengkap ?? null }}
                        </h4>
                        <small>Wilayah:
                            {{ $dapilKabupatens->pluck('name')->implode(', ') ?: 'N/A' }}
                        </small>
                    </div>
                    <div class="card-body">
                        @livewire('cek-status-suara', [
                            'prefix' => '',
                            'kabupaten_id' => old('kabupaten_id'),
                            'kecamatan_id' => old('kecamatan_id'),
                            'desa_id' => old('desa_id'),
                        ])
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Total Kunjungan</p>
                                <h4 class="mb-0">{{ $totalKunjungan ?? 'N/A' }}</h4>
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
                            <span class="text-success font-weight-bolder">{{ $totalKunjungan ?? 'N/A' }} </span>Total
                            Kunjungan
                        </p>
                        <a href="{{ route('administrator.index') }}" class="text-success" title="Lihat Detail">
                            <i class="material-symbols-rounded">visibility</i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Desa Terkunjungi</p>
                                <h4 class="mb-0">{{ $desaTerkunjungi ?? 'N/A' }}</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">app_registration</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3 d-flex justify-content-between align-items-center">
                        <p class="mb-0 text-sm">
                            <span class="text-success font-weight-bolder">{{ $persentaseDesa }}% </span>Desa telah
                            dikunjungi
                        </p>
                        <a href="{{ route('administrator.index') }}" class="text-success" title="Lihat Detail">
                            <i class="material-symbols-rounded">visibility</i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Isu Terkumpul</p>
                                <h4 class="mb-0">{{ $totalIsu ?? 'N/A' }}</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">clear_all</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3 d-flex justify-content-between align-items-center">
                        <p class="mb-0 text-sm">
                            <span class="text-success font-weight-bolder">{{ $totalIsu ?? 'N/A' }} </span>Isu/Aspirasi
                        </p>
                        <a href="{{ route('administrator.index') }}" class="text-success" title="Lihat Detail">
                            <i class="material-symbols-rounded">visibility</i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Rata-rata Kunjungan</p>
                                <h4 class="mb-0">{{ $rataRataKunjungan ?? 'N/A' }}</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">area_chart</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3 d-flex justify-content-between align-items-center">
                        <p class="mb-0 text-sm">
                            <span class="text-success font-weight-bolder">{{ $rataRataKunjungan ?? 'N/A' }} Kali
                            </span>Rerata Kunjungan per Bulan
                        </p>
                        <a href="{{ route('administrator.index') }}" class="text-success" title="Lihat Detail">
                            <i class="material-symbols-rounded">visibility</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0">Total Kunjungan per Bulan</h6>
                        <p class="text-sm">Agregasi Total Kunjungan Per Bulan Tahun <span
                                id="tahun-terpilih">{{ $tahun ?? 'N/A' }}</span>
                        </p>

                        <div class="mb-3">
                            <label for="pilihTahun" class="form-label text-sm">Pilih Tahun:</label>
                            <select class="form-select form-select-sm" id="pilihTahun" onchange="updateChartTahun()">
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025" selected>2025</option>
                            </select>
                        </div>

                        <div class="pe-2">
                            <div class="container">
                                <figure class="highcharts-figure">
                                    <div id="totalKunjungan"></div>
                                    <p class="highcharts-description"></p>
                                </figure>
                            </div>
                        </div>
                        <hr class="dark horizontal">
                        <div class="d-flex">
                            <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">Diupdate hari ini</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-8 col-md-6 mb-4">
                <div class="card ">
                    <div class="card-body">
                        <h6 class="mb-0 "> Aspirasi yang Diterima <strong> ({{ $dapil->name ?? 'N/A' }}) </strong></h6>
                        <p class="text-sm "> Data berdasarkan Kunjungan (Level Kecamatan)</p>

                        <div class="mb-3">
                            <label for="pilihTahun" class="form-label text-sm">Pilih Tahun:</label>
                            <select class="form-select form-select-sm" id="pilihTahunAspirasi"
                                onchange="updateChartTahunAspirasi()">
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025" selected>2025</option>
                            </select>
                        </div>
                        <div class="pe-2">
                            <div class="container">
                                <figure class="highcharts-figure">
                                    <div id="chartAspirasi"></div>
                                    <p class="highcharts-description">
                                    </p>
                                </figure>
                            </div>
                        </div>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm"> Diupdate hari ini </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="card shadow border">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0 text-white">Daftar Kegiatan
                        {{ $project->profile->nama_lengkap ?? null }}
                    </h4>
                    <small>Wilayah:
                        {{ $dapilKabupatens->pluck('name')->implode(', ') ?: 'N/A' }}
                    </small>
                </div>
                <div class="card-body px-0 pb-2" style="overflow-x: auto; overflow-y: auto;">
                    <h6 class="ps-2 mb-0">Tabel Kunjungan</h6>
                    <div class="table-responsive p-2">
                        {{ $dataTable->table([
                            'class' => 'table table-bordered table-striped table-vcenter table-sm fs-sm text-nowrap align-middle',
                        ]) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4 mt-4">
            <div class="col-xl-6 mb-xl-0 mb-4">
                <div class="card shadow border ">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0 text-white">Peta Dapil {{ $dapil->name ?? 'N/A' }}</h4>
                        <small>Wilayah:
                            {{ $dapilKabupatens->pluck('name')->implode(', ') ?: 'N/A' }}
                        </small>
                    </div>
                    <div class="card-body text-center mb-2">
                        @include('pages.user.dashboard.svg')
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-xl-0 mb-4">
                <div class="card shadow border ">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0 text-white">Sebaran Suara</h4>
                        <small>Peroleh Suara
                            {{ auth()->user()->project->profile->nama_lengkap ?? null }}
                        </small>
                    </div>
                    <div class="card-body text-center mb-2">
                        <figure class="highcharts-figure">
                            <div id="dropdown-wrapper" class="d-none">
                                <label id="kecamatanLabel"></label>
                                <select id="kecamatanDropdown" class="form-select"></select>
                            </div>
                            <div id="keterangan-kecamatan" class="mt-3"></div>
                            <div id="desa-wrapper" class="d-none mt-3">
                                <label>Pilih Desa:</label>
                                <select id="desaDropdown" class="form-select"></select>
                            </div>
                            <div id="keterangan-desa" class="mt-3"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    @include('components.datatables')
@endpush
