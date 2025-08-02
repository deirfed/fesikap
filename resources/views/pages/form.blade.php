@extends('layouts.base')

@section('title-head')
    <title>
        Form Aktivitas - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{ route('form') }}">Form</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="row mt-4 d-flex justify-content-center">
            <div class="col-8">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-dark border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Input Aktivitas</h6>
                        </div>
                    </div>
                    <form action="{{ route('admin') }}">
                        <div class="card-body px-4 pb-4">
                            <div class="mb-3">
                                <label for="isu" class="form-label">Desa<small class="text-muted"></small></label>
                                <select class="form-select border border-dark px-3" id="isu" name="isu">
                                    <option value="" selected>-- Pilih Desa --</option>
                                    <option value="Kesehatan">Sindang Agung (Kec. Sindang Agung - Dapil 3 KNG - Kab.
                                        Kuningan)</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Kunjungan</label>
                                <input type="date" class="form-control border border-dark px-3" id="tanggal"
                                    name="tanggal">
                            </div>

                            <div class="mb-3">
                                <label for="isu" class="form-label">Isu / Aspirasi <small
                                        class="text-muted">(opsional)</small></label>
                                <select class="form-select border border-dark px-3" id="isu" name="isu">
                                    <option value="" selected>Pilih Isu Aspirasi</option>
                                    <option value="Kesehatan">Kesehatan</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                    <option value="Infrastruktur">Infrastruktur</option>
                                    <option value="Ekonomi">Ekonomi</option>
                                    <option value="Lingkungan">Lingkungan</option>
                                    <option value="Sosial">Sosial</option>
                                    <option value="Transportasi">Transportasi</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Dokumentasi</label>
                                <input type="file" class="form-control border border-dark px-3" id="catatan"
                                    name="catatan"></input>
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Minutes of Meeting / Laporan Reses*</label>
                                <textarea type="file" class="form-control border border-dark px-3" id="catatan" name="catatan" rows="5"
                                    placeholder="Wajib Mengisi MoM" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea type="file" class="form-control border border-dark px-3" id="catatan" name="catatan" rows="2"
                                    placeholder="Tambahkan catatan jika perlu"></textarea>
                            </div>

                            <div class="text-end">
                                <a href="{{ route('admin') }}">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save me-1"></i> Simpan
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
