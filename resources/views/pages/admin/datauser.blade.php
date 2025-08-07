@extends('layouts.base')

@section('title-head')
    <title>
        User Setting - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('navigasi.index') }}">User Setting</a></li>
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="ms-3">
                <h3 class="mb-0 h4 font-weight-bolder">Kelola Akun</h3>
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
                            <h6 class="text-white text-capitalize ps-3">Data User / Tim Pemantau</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">

                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between align-items-center px-4 pb-3">
                            <h6 class="mb-0">Data User</h6>
                            <div class="d-flex gap-2">
                                <a href="{{ route('create.user') }}"><button class="btn btn-sm btn-primary"
                                        data-toggle="tooltip" title="Add New Activity">
                                        <i class="fas fa-plus me-1"></i> Tambah Data
                                    </button></a>
                                <a href=""><button class="btn btn-sm btn-secondary" data-toggle="tooltip"
                                        title="Filter Data">
                                        <i class="fas fa-filter me-1"></i> Filter
                                    </button></a>
                                <a href=""><button class="btn btn-sm btn-success" data-toggle="tooltip"
                                        title="Export Data">
                                        <i class="fas fa-file-export me-1"></i> Export
                                    </button></a>
                            </div>
                        </div>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center">
                                            No.
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Nama
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">
                                            Kontak
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Role
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Tim
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $loop->iteration + $users->firstItem() - 1 }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $user->name ?? '-' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $user->phone ?? '-' }}
                                                    <br>({{ $user->email }})</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $user->role->name ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $user->project->profile->nama_lengkap ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="#" class="badge bg-success text-white text-decoration-none"
                                                    title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="#" class="badge bg-dark text-white text-decoration-none"
                                                    title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="badge bg-danger text-white text-decoration-none"
                                                    title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
