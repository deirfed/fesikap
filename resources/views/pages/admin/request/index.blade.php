@extends('layouts.base')

@section('title-head')
    <title>
        Request Fitur / Keluhan - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <x-breadcrumb :items="[
        ['label' => 'Menu', 'route' => route('menu.index')],
        ['label' => 'Halaman Admin', 'route' => route('administrator.index')],
        ['label' => 'Form Request', 'route' => route('request.create')],
    ]" />
@endsection

@push('javascript')
    @vite('resources/js/formInputIsu.js');
@endpush

@section('content')
    <div class="container-fluid py-2">
        <div class="row mt-4 d-flex justify-content-center">
            <div class="col-xl-8 col-md-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-dark border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Request Fitur</h6>
                        </div>
                    </div>
                    <form action="{{ route('request.store') }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="card-body px-4 pb-4">
                            <div class="mb-3">
                                <label for="request_type_id" class="form-label">Jenis Tiket<small
                                        class="text-muted"></small></label>
                                <select class="form-select border border-dark px-3" id="request_type_id" name="request_type_id" required>
                                    <option value="" selected disabled>-- Pilih Jenis Request --</option>
                                    @foreach ($request_types as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal Permohonan</label>
                                <input type="date" class="form-control border border-dark px-3" id="date"
                                    name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Detail Request</label>
                                <textarea class="form-control border border-dark px-3" id="description" name="description" rows="4"
                                    placeholder="Silakan deskripsikan Keluhan / Permohonan Fitur Baru..." required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Dokumentasi (Opsional)</label>
                                <input type="file" class="form-control border border-dark px-3" id="photo"
                                    name="photo" accept="image/*">
                            </div>
                            <div class="text-end">
                                <a class="btn btn-primary" href="{{ route('administrator.index') }}">
                                    <i class="fas fa-times me-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-1"></i> Ajukan Permohonan
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
