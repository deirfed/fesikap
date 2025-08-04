@extends('layouts.base')

@section('title-head')
    <title>
        Request Fitur / Keluhan - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{ route('form-activity') }}">Form Request Fitur</a>
    </li>
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
                    <form action="{{ route('admin') }}">
                        <div class="card-body px-4 pb-4">
                            <div class="mb-3">
                                <label for="isu" class="form-label">Jenis Tiket<small class="text-muted"></small></label>
                                <select class="form-select border border-dark px-3" id="isu" name="isu">
                                    <option value="" selected>-- Pilih Jenis Request --</option>
                                    <option value="">Fitur Baru</option>
                                    <option value="">Keluhan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Permohonan</label>
                                <input type="date" class="form-control border border-dark px-3" id="tanggal"
                                    name="tanggal">
                            </div>

                            <div class="mb-3">
                                <label for="dokumentasi" class="form-label">Dokumentasi (Opsional)</label>
                                <input type="file" class="form-control border border-dark px-3" id="catatan"
                                    name="dokumentasi"></input>
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Detail Request</label>
                                <textarea type="file" class="form-control border border-dark px-3" id="catatan" name="catatan" rows="2"
                                    placeholder="Silakan deskripsikan Keluhan / Permohonan Fitur Baru..."></textarea>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('admin') }}">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save me-1"></i> Ajukan Permohonan
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
