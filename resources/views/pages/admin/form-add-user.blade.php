@extends('layouts.base')

@section('title-head')
    <title>
        Form Tambah User - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <li class="breadcrumb-item text-sm">
        <a class="opacity-5 text-dark" href="{{ route('form-activity') }}">Form User</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="row mt-4 d-flex justify-content-center">
            <div class="col-xl-8 col-md-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-dark border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Tambah Data User</h6>
                        </div>
                    </div>
                    <form action="{{ route('store.user') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="card-body px-4 pb-4">
                            <div class="mb-3">
                                <label for="dokumentasi" class="form-label">Nama</label>
                                <input type="text" class="form-control border border-dark px-3" id="name"
                                    name="name"></input>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role<small class="text-muted"></small></label>
                                <select class="form-select border border-dark px-3" id="role" name="role">
                                    <option value="" selected>-- Pilih Role --</option>
                                    <option value="user">User / Tim Pemantau</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="dokumentasi" class="form-label">Email</label>
                                <input type="email" class="form-control border border-dark px-3" id="email"
                                    name="email"></input>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">No. HP</label>
                                <input type="number" class="form-control border border-dark px-3" id="phone"
                                    name="phone"></input>
                            </div>
                            <div class="text-end">
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
