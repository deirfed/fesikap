@extends('layouts.base')

@section('title-head')
    <title>
        User Setting - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <x-breadcrumb :items="[
        ['label' => 'Menu', 'route' => route('menu.index')],
        ['label' => 'Halaman Admin', 'route' => route('administrator.index')],
        ['label' => 'Data User', 'route' => route('user.index')],
    ]" />
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
                            <h6 class="text-white text-capitalize ps-3">Tim {{ $project->profile->nama_lengkap ?? null }}
                            </h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between align-items-center px-4 pb-3">
                            <h6 class="mb-0">Data User</h6>
                            <div class="d-flex gap-2">
                                <a class="btn btn-sm btn-primary" href="{{ route('user.create') }}" data-toggle="tooltip"
                                    title="Add New Activity">
                                    <i class="fas fa-plus me-1"></i> Tambah Data
                                </a>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#filterModal" title="Filter Data">
                                    <i class="fas fa-filter me-1"></i> Filter
                                </button>
                            </div>
                        </div>
                        <!-- End Tombol Aksi -->
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

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="deleteForm" action="#" method="POST">
                @csrf
                @method('delete')
                <div class="modal-content text-center">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteModalLabel">
                            <i class="fas fa-exclamation-triangle me-2"></i> Konfirmasi Ban
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin ingin banning pada user ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ban</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Delete Modal -->

    <!-- Activate Modal -->
    <div class="modal fade" id="activateModal" tabindex="-1" aria-labelledby="activateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="activateForm" action="#" method="POST">
                @csrf
                @method('delete')
                <div class="modal-content text-center">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title">
                            <i class="fas fa-exclamation-triangle me-2"></i> Konfirmasi Aktivasi
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin ingin mengaktifkan user ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Aktifkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Activate Modal -->

    <!-- Filter Modal -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('user.index') }}" method="GET">
                @method('GET')
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filterModalLabel">Filter Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="role_id" class="form-label">Role</label>
                            <select class="form-select border border-dark p-2" id="role_id" name="role_id">
                                <option value="" selected disabled>-- pilih role --</option>
                                @foreach ($roles as $item)
                                    <option value="{{ $item->id }}" @selected($item->id == $role_id)>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select border border-dark p-2" id="status" name="status">
                                <option value="" selected disabled>-- pilih status --</option>
                                <option value="active" @selected($status == 'active')>Active</option>
                                <option value="banned" @selected($status == 'banned')>Banned</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('user.index') }}" class="btn btn-primary">Reset</a>
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

@section('javascript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#deleteModal').on('show.bs.modal', function(e) {
                var url = $(e.relatedTarget).data('url');

                document.getElementById("deleteForm").action = url;
            });

            $('#activateModal').on('show.bs.modal', function(e) {
                var url = $(e.relatedTarget).data('url');

                document.getElementById("activateForm").action = url;
            });
        });
    </script>
@endsection
