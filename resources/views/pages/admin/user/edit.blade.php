@extends('layouts.base')

@section('title-head')
    <title>Edit User - Sistem Kelola Aspirasi Publik</title>
@endsection

@section('page-name')
    <x-breadcrumb :items="[
        ['label' => 'Menu', 'route' => route('menu.index')],
        ['label' => 'Halaman Admin', 'route' => route('administrator.index')],
        ['label' => 'Data User', 'route' => route('user.index')],
        ['label' => 'Edit User'],
    ]" />
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="row mt-4 d-flex justify-content-center">
            <div class="col-xl-8 col-md-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-success shadow-dark border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Edit Data User</h6>
                        </div>
                    </div>
                    <form action="{{ route('user.update', $user->uuid) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body px-4 pb-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control border border-dark px-3" id="name"
                                    name="name" value="{{ $user->name }}" required autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="gender_id" class="form-label">Gender</label>
                                <select class="form-select border border-dark px-3" id="gender_id" name="gender_id">
                                    <option value="" disabled>- pilih gender -</option>
                                    @foreach ($genders as $item)
                                        <option value="{{ $item->id }}" @selected(old('gender_id', $user->gender_id) == $item->id)>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="role_id" class="form-label">Role</label>
                                <select class="form-select border border-dark px-3" id="role_id" name="role_id">
                                    <option value="" disabled>- pilih role -</option>
                                    @foreach ($roles as $item)
                                        <option value="{{ $item->id }}" @selected(old('role_id', $user->role_id) == $item->id)>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control border border-dark px-3" id="email"
                                    name="email" value="{{ old('email', $user->email) }}" required autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">No. HP</label>
                                <input type="number" class="form-control border border-dark px-3" id="phone"
                                    name="phone" value="{{ old('phone', $user->phone) }}" required autocomplete="off">
                            </div>

                            <div class="text-end">
                                <a class="btn btn-primary" href="{{ route('user.index') }}">
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
