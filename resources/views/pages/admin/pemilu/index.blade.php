@extends('layouts.base')

@section('title-head')
    <title>
        RAW Data - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('navigasi.index') }}">Data Pemilu</a></li>
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="ms-3">
                <h3 class="mb-0 h4 font-weight-bolder">Data Pemilu</h3>
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
                            <h6 class="text-white text-capitalize ps-3">Data Hasil Pemilu</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <!-- Tombol Aksi -->
                        <div class="d-flex justify-content-between align-items-center px-4 pb-3">
                            <h6 class="mb-0">Data Pemilu</h6>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#filterModal" title="Filter Data">
                                    <i class="fas fa-filter me-1"></i> Filter
                                </button>

                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exportModal" title="Export Data">
                                    <i class="fas fa-file-export me-1"></i> Export
                                </button>

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
                                            Profile
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Suara
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Suara Partai
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Total
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Partai
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Dapil
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Desa
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Kecamatan
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                            Kabupaten
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemilu as $item)
                                        <tr>
                                            <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                            <td class="align-middle text-center">{{ $item->tps->dapil->project->profile->nama_lengkap ?? 'N/A' }}</td>
                                            <td class="align-middle text-center">{{ $item->vote ?? 0 }}</td>
                                            <td class="align-middle text-center">{{ $item->vote_party ?? 0 }}</td>
                                            <td class="align-middle text-center">{{ $item->vote + $item->vote_party ?? 0 }}</td>
                                            <td class="align-middle text-center">{{ $item->tps->dapil->project->party->name ?? 'N/A' }}</td>
                                            <td class="align-middle text-center">{{ $item->tps->dapil->name ?? 'N/A' }}</td>
                                            <td class="align-middle text-center">{{ $item->tps->desa->name ?? 'N/A' }}</td>
                                            <td class="align-middle text-center">{{ $item->tps->desa->kecamatan->name ?? 'N/A' }}</td>
                                            <td class="align-middle text-center">{{ $item->tps->desa->kecamatan->kabupaten->name ?? 'N/A' }}</td>
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

    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="#" method="GET">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exportModalLabel">Export Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="format" class="form-label">Pilih Format Export</label>
                            <select class="form-select" id="format" name="format" required>
                                <option value="xlsx">Excel (.xlsx)</option>
                                <option value="csv">CSV (.csv)</option>
                                <option value="pdf">PDF (.pdf)</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Export Sekarang</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="#" method="GET">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filterModalLabel">Filter Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="kabupaten" class="form-label">Kabupaten</label>
                            <select name="kabupaten" id="kabupaten" class="form-select">
                                <option value="">Pilih Kabupaten</option>
                                <option value="Kuningan">Kuningan</option>
                                <option value="Ciamis">Ciamis</option>
                                <option value="Banjar">Banjar</option>
                                <option value="Pangandaran">Pangandaran</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-select">
                                <option value="">Pilih Kecamatan</option>
                                <option value="Cigugur">Cigugur</option>
                                <option value="Cibereum">Cibereum</option>
                                <option value="Kalipucang">Kalipucang</option>
                                <option value="Sidamulih">Sidamulih</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="desa" class="form-label">Desa</label>
                            <select name="desa" id="desa" class="form-select">
                                <option value="">Pilih Desa</option>
                                <option value="Desa A">Desa A</option>
                                <option value="Desa B">Desa B</option>
                                <option value="Desa C">Desa C</option>
                                <option value="Desa D">Desa D</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Terapkan Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
