@extends('layouts.base')

@section('title-head')
    <title>
        Profile - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <x-breadcrumb :items="[
        ['label' => 'Menu', 'route' => route('menu.index')],
        ['label' => 'Halaman Admin', 'route' => route('administrator.index')],
        ['label' => 'Profile', 'route' => route('profile.index')],
    ]" />
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4 position-relative"
                style="background-image: url('{{ asset('assets-frontend/img/pattern.jpg') }}'); background-size: cover; background-position: center;">
                <span class="mask bg-gradient-dark opacity-6 position-absolute w-100 h-100"></span>

                <div class="position-absolute top-50 start-50 translate-middle z-index-2 text-center">
                    <img src="{{ env('APP_CMS_URL') }}/storage/{{ $project->party->logo ?? 'N/A' }}" alt="logo_partai"
                        style="width: 100px; height: auto;">
                </div>
            </div>


            <div class="card card-body mx-2 mx-md-2 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ env('APP_CMS_URL') }}/storage/{{ $project->profile->photo ?? 'N/A' }}"
                                alt="photo_profile" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $project->profile->nama_lengkap ?? 'N/A' }}
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                {{ $project->election_type->name ?? 'N/A' }} ({{ $dapil->name ?? 'N/A' }})
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0">Informasi Profil</h6>
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit Profile"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <p class="text-sm">
                                        {{ $project->profile->description ?? 'N/A' }}
                                    </p>
                                    <hr class="horizontal gray-light">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                class="text-dark">Nama Lengkap:</strong> &nbsp;
                                            {{ $project->profile->nama_lengkap ?? 'N/A' }}
                                        </li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nomor
                                                HP:</strong> &nbsp;
                                            {{ $project->profile->phone ?? 'N/A' }}
                                        </li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Email:</strong> &nbsp;
                                            {{ $project->profile->email ?? 'N/A' }}
                                        </li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Alamat:</strong> &nbsp;
                                            {{ $project->profile->address ?? 'N/A' }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Admin Pengelola</h6>
                                </div>
                                <div class="card-body p-3">
                                    <ul class="list-group">
                                        @foreach ($admin as $item)
                                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                                                <div class="avatar me-3">
                                                    <img src="{{ asset('assets-frontend/img/john.jpg') }}" alt="kal"
                                                        class="border-radius-lg shadow">
                                                </div>
                                                <div class="d-flex align-items-start flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $item->name ?? 'N/A' }}</h6>
                                                    <p class="mb-0 text-xs">{{ $item->email ?? 'N/A' }}</p>
                                                </div>
                                                <a class="btn btn-link text-success pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                    href="javascript:;">{{ $item->role->code ?? 'N/A' }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Tim Pemantau</h6>
                                </div>
                                <div class="card-body p-3">
                                    <ul class="list-group">
                                        @foreach ($user as $item)
                                            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                                                <div class="avatar me-3">
                                                    <img src="{{ asset('assets-frontend/img/john.jpg') }}" alt="kal"
                                                        class="border-radius-lg shadow">
                                                </div>
                                                <div class="d-flex align-items-start flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $item->name ?? 'N/A' }}</h6>
                                                    <p class="mb-0 text-xs">{{ $item->email ?? 'N/A' }}</p>
                                                </div>
                                                <a class="btn btn-link text-success pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto"
                                                    href="javascript:;">{{ $item->role->code ?? 'N/A' }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('profile.update', $project->profile->uuid) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" id="name" class="form-control border border-dark px-3"
                                value="{{ $project->profile->nama_lengkap ?? 'N/A' }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email"
                                class="form-control border border-dark px-3" placeholder="input email"
                                value="{{ $project->profile->email ?? 'N/A' }}" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Nomor HP</label>
                            <input type="text" name="phone" id="phone"
                                class="form-control border border-dark px-3" placeholder="input nomor hp"
                                value="{{ $project->profile->phone ?? 'N/A' }}" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control border border-dark px-3" name="address" id="address" required
                                placeholder="input alamat">{{ $project->profile->address ?? 'N/A' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control border border-dark px-3" name="description" id="description" required
                                placeholder="input deskripsi" rows="7">{{ $project->profile->description ?? 'N/A' }}</textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Edit Modal -->
@endsection
