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
                                <a class="btn btn-sm btn-primary" href="{{ route('user.create') }}" data-toggle="tooltip" title="Add New Activity">
                                    <i class="fas fa-plus me-1"></i> Tambah Data
                                </a>
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
        <div class="modal-dialog modal-dialog-centered">
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content text-center">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteModalLabel">
                            <i class="fas fa-exclamation-triangle me-2"></i> Konfirmasi Hapus
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin ingin menghapus user <strong id="deleteUserName">user</strong>?</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Delete Modal -->
@endsection

@push('javascript')
    @include('components.datatables')
@endpush

@section('javascript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const userId = button.getAttribute('data-id');
                const userName = button.getAttribute('data-name');

                const form = deleteModal.querySelector('#deleteForm');
                const nameHolder = deleteModal.querySelector('#deleteUserName');

                form.action = `/admin/user/${userId}`;
                nameHolder.textContent = userName;
            });
        });
    </script>
@endsection
