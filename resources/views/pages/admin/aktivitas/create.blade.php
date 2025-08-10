@extends('layouts.base')

@section('title-head')
    <title>
        Form Aktivitas - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <x-breadcrumb :items="[
        ['label' => 'Menu', 'route' => route('menu.index')],
        ['label' => 'Halaman Admin', 'route' => route('administrator.index')],
        ['label' => 'Input Aktivitas'],
    ]" />
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
                                <label for="visit_type_id" class="form-label">Jenis Aktivitas<small
                                        class="text-muted"></small></label>
                                <select class="form-select border border-dark px-3" id="visit_type_id" name="visit_type_id"
                                    required>
                                    <option value="" selected>-- Pilih jenis aktivitas --</option>
                                    @foreach ($visit_types as $item)
                                        <option value="{{ $item->id }}" @selected($item->id == old('visit_type_id'))>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @livewire('filter-lokasi', [
                                'prefix' => '',
                                'kabupaten_id' => old('kabupaten_id'),
                                'kecamatan_id' => old('kecamatan_id'),
                                'desa_id' => old('desa_id'),
                            ])
                            <div class="mb-3">
                                <label for="address" class="form-label">Detail Lokasi</label>
                                <textarea class="form-control border border-dark px-3" id="address" name="address" rows="2"
                                    placeholder="Detail lokasi kunjungan" required>{{ old('address') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal Kunjungan</label>
                                <input type="date" class="form-control border border-dark px-3" id="date"
                                    name="date" required value="{{ old('date') }}">
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Minutes of Meeting / Laporan Kunjungan</label>
                                <textarea class="form-control border border-dark px-3" id="name" name="name" rows="5"
                                    placeholder="Wajib Mengisi MoM" required>{{ old('name') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">Dokumentasi (Photo)</label>
                                <input type="file" class="form-control border border-dark px-3" id="photo"
                                    name="photo" accept="image/*">
                            </div>

                            <div class="mb-3">
                                <label for="remark" class="form-label">Catatan</label>
                                <textarea class="form-control border border-dark px-3" id="remark" name="remark" rows="2"
                                    placeholder="Tambahkan catatan jika perlu">{{ old('remark') }}</textarea>
                            </div>
                            <div class="text-end">
                                <a class="btn btn-primary" href="{{ route('administrator.index') }}">
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
