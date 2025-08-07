@extends('layouts.base')

@section('title-head')
    <title>
        Informasi - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('dashboard.index') }}">Informasi Web</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="ms-3">
                <h3 class="mb-0 h4 font-weight-bolder">Info</h3>
                <p class="mb-4">
                    Sistem Kelola Aspirasi Publik
                </p>
            </div>
            <div class="col-12 mb-4">
                <div class="card shadow border">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0 text-white">Informasi Website</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="fw-bold">Masa Berlaku Website</h5>
                            <p>
                                Website ini aktif dan berjalan hingga <strong>31 Desember 2025</strong>. Pastikan data dan
                                aktivitas sudah tersimpan dengan baik sebelum tanggal tersebut. Pembaruan layanan akan
                                diumumkan melalui dashboard admin.
                            </p>
                        </div>

                        <div class="mb-4">
                            <h5 class="fw-bold">Jumlah Akun yang Diizinkan</h5>
                            <ul class="list-group mb-2">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Admin
                                    <span class="badge bg-success rounded-pill">5 Akun</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Pengguna (User)
                                    <span class="badge bg-primary rounded-pill">100 Akun</span>
                                </li>
                            </ul>
                            <small class="text-muted">Jika membutuhkan penambahan akun, silakan hubungi <span><a
                                        href="{{ route('request-fitur') }}">pengelola
                                        sistem (Klik di sini)</a></span></small>
                        </div>

                        <div class="mb-4">
                            <h5 class="fw-bold">Fitur-Fitur Sistem</h5>
                            <ul>
                                <li><strong>Manajemen Aspirasi Publik</strong> – Monitoring aspirasi
                                    secara langsung melalui form digital.</li>
                                <li><strong>Dashboard Admin</strong> – Admin dapat melihat statistik, data kunjungan, serta
                                    memproses dan menindaklanjuti aspirasi.</li>
                                <li><strong>Pemetaan Wilayah</strong> – Data aspirasi dikelompokkan berdasarkan lokasi
                                    geografis (Kabupaten, Kecamatan, Desa).</li>
                                <li><strong>Riwayat & Arsip</strong> – Seluruh data terekam dan dapat diakses kembali
                                    melalui menu arsip.</li>
                                <li><strong>Pengelolaan User</strong> – Admin dapat menambah, mengubah, dan menghapus akun
                                    pengguna.</li>
                            </ul>
                        </div>

                        <div class="mb-4">
                            <h5 class="fw-bold">Tentang Aplikasi</h5>
                            <p>
                                Aplikasi ini dibangun untuk mempermudah proses penghimpunan dan penanganan aspirasi publik
                                secara efisien dan transparan. Seluruh fitur dirancang untuk mendukung keterlibatan
                                masyarakat dan memberikan kemudahan bagi petugas lapangan serta tim pengelola.
                            </p>
                        </div>

                        <div class="text-muted text-end">
                            <em>SIKAP - APP v1.0.0 – Terakhir diperbarui: 1 Agustus 2025</em>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
