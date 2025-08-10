@extends('layouts.base')

@section('title-head')
    <title>
        RAW Data - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <x-breadcrumb :items="[
        ['label' => 'Menu', 'route' => route('menu.index')],
        ['label' => 'Data Pemilu', 'route' => route('pemilu.index')],
    ]" />
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="ms-3">
                <h3 class="mb-0 h4 font-weight-bolder">Data Pemilu</h3>
                <p class="mb-4">
                    Sistem Kelola Aspirasi Publik
                </p>
            </div>
        </div>
        <div class="row mt-4 d-flex justify-content-center">
            <div class="col-xl-12 col-md-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-dark border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Data Hasil Pemilu</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between align-items-center px-4 pb-1">
                            <h6 class="mb-0">Data Pemilu</h6>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#filterModal" title="Filter Data">
                                    <i class="fas fa-filter me-1"></i> Filter
                                </button>

                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exportModal" title="Export Data">
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

    <!-- Export Modal -->
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('pemilu.export') }}" method="POST">
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

    <!-- Filter Modal -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('pemilu.index') }}" method="GET">
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
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('pemilu.index') }}" class="btn btn-primary">Reset</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Terapkan Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Filter Modal -->
@endsection

@push('javascript')
    @include('components.datatables')
@endpush
