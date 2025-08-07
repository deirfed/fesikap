@extends('layouts.base')

@section('title-head')
    <title>
        Form Aktivitas - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{ route('navigasi.index') }}">Admin</a>
    </li>
@endsection

{{-- @push('javascript')
    @vite('resources/js/formInputIsu.js');
@endpush --}}

@section('content')
    <div class="container-fluid py-2">
        <div class="row mt-4 d-flex justify-content-center">
            <div class="col-xl-8 col-md-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-dark border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Input Aktivitas</h6>
                        </div>
                    </div>
                    <form action="{{ route('aktivitas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card-body px-4 pb-4">
                            <div class="mb-3">
                                <label for="visit_type_id" class="form-label">Jenis Aktivitas<small class="text-muted"></small></label>
                                <select class="form-select border border-dark px-3" id="visit_type_id" name="visit_type_id" required>
                                    <option value="" selected>-- Pilih jenis aktivitas --</option>
                                    @foreach ($visit_types as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="desa_id" class="form-label">Desa<small class="text-muted"></small></label>
                                <select class="form-select border border-dark px-3" id="desa_id" name="desa_id" required>
                                    <option value="" selected>-- Pilih Desa --</option>
                                    @foreach ($desa as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }} - Kec. {{ $item->kecamatan->name ?? 'N/A' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Detail Lokasi</label>
                                <textarea class="form-control border border-dark px-3" id="address" name="address" rows="2"
                                    placeholder="Detail lokasi kunjungan" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal Kunjungan</label>
                                <input type="date" class="form-control border border-dark px-3" id="date"
                                    name="date" required>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Minutes of Meeting / Laporan Kunjungan</label>
                                <textarea class="form-control border border-dark px-3" id="name" name="name" rows="5"
                                    placeholder="Wajib Mengisi MoM" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">Dokumentasi (Photo)</label>
                                <input type="file" class="form-control border border-dark px-3" id="photo"
                                    name="photo" accept="image/*">
                            </div>

                            <div class="mb-3">
                                <label for="remark" class="form-label">Catatan</label>
                                <textarea class="form-control border border-dark px-3" id="remark" name="remark" rows="2"
                                    placeholder="Tambahkan catatan jika perlu"></textarea>
                            </div>

                            {{-- <div class="card shadow-sm border border-dark p-3 mb-4 bg-light-subtle">
                                <h6 class="text-dark fw-bold mb-3">Tambahkan Isu / Aspirasi</h6>

                                <div class="row g-3 align-items-start">
                                    <div class="col-md-6">
                                        <label for="isuSelect" class="form-label mb-1">Kategori Isu</label>
                                        <select class="form-select form-select-sm border-dark" id="isuSelect">
                                            <option value="" selected disabled>Pilih kategori</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="isuDetail" class="form-label mb-1">Detail Masalah</label>
                                        <textarea id="isuDetail" class="form-control border border-dark px-3" rows="3"
                                            placeholder="Masukkan penjelasan isu/masalah..."></textarea>
                                    </div>

                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="button" class="btn btn-success btn-sm w-100" id="addIsuBtn">Tambah
                                        </button>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div id="keranjangIsu" class="mb-2">
                                    <label class="form-label fw-semibold">Daftar Isu Ditambahkan:</label>
                                    <div id="isuList" class="d-flex flex-column gap-2"></div>
                                </div>

                                <input type="hidden" name="daftar_isu" id="daftarIsuInput">
                            </div> --}}
                            <div class="text-end">
                                <a class="btn btn-primary" href="{{ route('navigasi.index') }}">
                                    <i class="fas fa-times me-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
