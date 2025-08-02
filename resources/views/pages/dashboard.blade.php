@extends('layouts.base')

@section('title-head')
    <title>
        Dashboard - Sistem Kelola Aspirasi Publik
    </title>
@endsection

@section('page-name')
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('main-dashboard') }}">Dashboard</a></li>
@endsection

@section('content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="ms-3">
                <h3 class="mb-0 h4 font-weight-bolder">SIKAP</h3>
                <p class="mb-4">
                    Sistem Kelola Aspirasi Publik
                </p>
            </div>

            <div class="col-xl-6 mb-xl-0 mb-4">
                <div class="card bg-transparent shadow-xl">
                    <div class="overflow-hidden position-relative border-radius-xl">
                        <img src="{{ asset('assets-frontend/img/pattern.jpg') }}"
                            class="position-absolute opacity-2 start-0 top-0 w-100 z-index-1 h-100" alt="pattern-tree">
                        <span class="mask bg-gradient-success opacity-10"></span>
                        <div class="card-body position-relative z-index-1 p-3">
                            <h5 class="text-white mt-4 mb-5 pb-2">H. Arief Maoshul Affandy</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-4">
                                    <p class="text-white text-sm opacity-8 mb-0">Wilayah Dapil</p>
                                    <h6 class="text-white mb-0">Jabar XIII</h6>
                                </div>
                                <div>
                                    <p class="text-white text-sm opacity-8 mb-0">Menjabat Sejak</p>
                                    <h6 class="text-white mb-0">10/05/2025</h6>
                                </div>
                                <div class="mx-3 text-center">
                                    <img src="{{ asset('assets-frontend/img/harief.png') }}" alt="foto"
                                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%; border: 2px solid #fff;">
                                </div>
                                <div style="max-width: 60px; width: 100%; overflow: hidden;">
                                    <img src="{{ asset('assets-frontend/img/ppp.png') }}" alt="logo partai"
                                        style="width: 100%; height: auto; display: block; object-fit: contain;">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-4">
                <div class="row">
                    <div class="col-md-6 col-6">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">progress_activity</i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Day Counter</h6>
                                <hr class="horizontal dark my-3">
                                <h5 class="mb-0">303 Hari</h5>
                                <span class="text-xs">Sejak Menjabat</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">quick_reference_all</i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Isu</h6>
                                <hr class="horizontal dark my-3">
                                <h5 class="mb-0">5 Jenis</h5>
                                <span class="text-xs">Kelompok Isu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Total Kunjungan</p>
                                <h4 class="mb-0">150</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">check</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3 d-flex justify-content-between align-items-center">
                        <p class="mb-0 text-sm">
                            <span class="text-success font-weight-bolder">150 </span>Total Kunjungan / Reses
                        </p>
                        <a href="{{ route('admin') }}" class="text-success" title="Lihat Detail">
                            <i class="material-symbols-rounded">visibility</i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Desa Terkunjungi</p>
                                <h4 class="mb-0">356</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">app_registration</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3 d-flex justify-content-between align-items-center">
                        <p class="mb-0 text-sm">
                            <span class="text-success font-weight-bolder">50% </span>Desa telah dikunjungi
                        </p>
                        <a href="#detail-kunjungan" class="text-success" title="Lihat Detail">
                            <i class="material-symbols-rounded">visibility</i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Isu Terkumpul</p>
                                <h4 class="mb-0">3,462</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">clear_all</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3 d-flex justify-content-between align-items-center">
                        <p class="mb-0 text-sm">
                            <span class="text-success font-weight-bolder">2345 </span>Isu / Aspirasi
                        </p>
                        <a href="{{ route('admin') }}" class="text-success" title="Lihat Detail">
                            <i class="material-symbols-rounded">visibility</i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Avg. Kunjungan</p>
                                <h4 class="mb-0">10</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">unfold_less</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3 d-flex justify-content-between align-items-center">
                        <p class="mb-0 text-sm">
                            <span class="text-success font-weight-bolder">10 Kali </span>Rerata Kunjungan per Bulan
                        </p>
                        <a href="#detail-kunjungan" class="text-success" title="Lihat Detail">
                            <i class="material-symbols-rounded">visibility</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0 ">Total Kunjungan per Bulan</h6>
                        <p class="text-sm ">Agregasi Total Kunjungan Per Bulan Tahun 2025</p>
                        <div class="pe-2">
                            <div class="chart">
                                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">Diupdate hari ini</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card ">
                    <div class="card-body">
                        <h6 class="mb-0 "> Aspirasi yang Diterima <strong> (Jabar XIII) </strong></h6>
                        <p class="text-sm "> Data berdasarkan Kunjungan / Reses</p>
                        <div class="pe-2">
                            <div class="chart">
                                <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm"> Diupdate hari ini </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0 ">Agenda Terlaksana</h6>
                        <p class="text-sm ">Total Agenda Terlaksana</p>
                        <div class="pe-2">
                            <div class="chart">
                                <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">Diupdate hari ini</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4 mt-4">
            <div class="col-xl-4 mb-xl-0 mb-4">
                <div class="card shadow border ">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0 text-white">Peta Dapil Jabar XIII</h4>
                        <small>Wilayah: Kuningan, Ciamis, Banjar, Pangandaran</small>
                    </div>
                    <div class="card-body text-center mb-2">
                        @include('pages.svg')
                    </div>
                </div>
            </div>
            <div class="col-xl-8 mb-xl-0 mb-4">
                <div class="card shadow border ">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0 text-white">Heat Map Dapil Jabar XIII</h4>
                        <small>Peroleh Suara H. Arief Maoshul Affendy</small>
                    </div>
                    <div class="card-body text-center mb-2">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                            <p class="highcharts-description">
                            </p>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4 mt-4">
            <div class="col-8">
                <div class="card shadow border">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0 text-white">Daftar Desa Jabar XIII</h4>
                        <small>Wilayah: Kuningan, Ciamis, Banjar, Pangandaran</small>
                    </div>
                    <div class="card-body text-center">
                        <div class="container">
                            <div class="row">
                                <!-- KABUPATEN KUNINGAN -->
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="card h-100 border shadow-sm">
                                        <div class="card-header bg-dark text-white text-center py-2">
                                            <strong>Kab. Kuningan</strong>
                                        </div>
                                        <div class="card-body p-2" style="max-height: 250px; overflow-y: auto;">
                                            <ul class="list-unstyled mb-0">
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-success btn-sm mb-1">Ciawigebang</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Cilimus</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Kadugede</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Lebakwangi</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Ancaran</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Nanggerang</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Garawangi</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Cigugur</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- KABUPATEN CIAMIS -->
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="card h-100 border shadow-sm">
                                        <div class="card-header bg-dark text-white text-center py-2">
                                            <strong>Kab. Ciamis</strong>
                                        </div>
                                        <div class="card-body p-2" style="max-height: 250px; overflow-y: auto;">
                                            <ul class="list-unstyled mb-0">
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Banjaranyar</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Baregbeg</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-success btn-sm mb-1">Banjarsari</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Ciamis</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-success btn-sm mb-1">Cikoneng</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Cijeungjing</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- KOTA BANJAR -->
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="card h-100 border shadow-sm">
                                        <div class="card-header bg-dark text-white text-center py-2">
                                            <strong>Kota Banjar</strong>
                                        </div>
                                        <div class="card-body p-2" style="max-height: 250px; overflow-y: auto;">
                                            <ul class="list-unstyled mb-0">
                                                <li>
                                                    <a href="#" class="btn btn-outline-dark btn-sm mb-1 w-100"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#detailModalBelum">Banjar</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="btn btn-success btn-sm mb-1 w-100"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#detailModal">Purwaharja</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="btn btn-outline-dark btn-sm mb-1 w-100"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#detailModalBelum">Langensari</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="btn btn-outline-dark btn-sm mb-1 w-100"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#detailModalBelum">Bojongsoang</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="btn btn-outline-dark btn-sm mb-1 w-100"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#detailModalBelum">Jarian</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="btn btn-outline-dark btn-sm mb-1 w-100"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#detailModalBelum">Panarukan</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="btn btn-success btn-sm mb-1 w-100"
                                                        data-bs-toggle="modal" data-bs-target="#detailModal">Pataruman</a>
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                </div>

                                <!-- KABUPATEN PANGANDARAN -->
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="card h-100 border shadow-sm">
                                        <div class="card-header bg-dark text-white text-center py-2">
                                            <strong>Kab. Pangandaran</strong>
                                        </div>
                                        <div class="card-body p-2" style="max-height: 250px; overflow-y: auto;">
                                            <ul class="list-unstyled mb-0">
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Parigi</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Cijulang</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Cimerak</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Sidamulih</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Kalipucang</a>
                                                </li>
                                                <li><a href="#"
                                                        class="d-block text-start btn btn-outline-dark btn-sm mb-1">Padaherang</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card shadow border">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0 text-white">Pintasan Informasi</h4>
                        <small>Peroleh Suara H. Arief Maoshul Effendy</small>
                    </div>
                    <div class="card-body text-center">
                        <div class="container py-5">
                            <h6 class="text-success fw-bold mb-3">Peringkat Tertinggi Kumulatif</h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><strong>Level Kabupaten</strong></span>
                                    <span>Kuningan (13.000 Suara)</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><strong>Level Dapil</strong></span>
                                    <span>Dapil 3 Kuningan (15.000 Suara)</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><strong>Level Kecamatan</strong></span>
                                    <span>Kecamatan Cilimus (130 Suara)</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><strong>Level Desa</strong></span>
                                    <span>Desa Mekarmulya (45 Suara)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Informasi Kunjungan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalContent">
                    <div class="mb-3">
                        <strong>Desa:</strong> Mekarjaya<br>
                        <strong>TPS:</strong> TPS 03<br>
                        <strong>Total Suara:</strong> 312
                    </div>
                    <div class="mb-3">
                        <span class="badge bg-success">Sudah dikunjungi</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item text-center">
                            <a href="{{ route('detail') }}" class="text-decoration-none">Lihat detail kunjungan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailModalBelum" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Informasi Kunjungan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalContent">
                    <div class="mb-3">
                        <strong>Desa:</strong> Mekarjaya<br>
                        <strong>TPS:</strong> TPS 03<br>
                        <strong>Total Suara:</strong> 312
                    </div>

                    <div class="mb-3">
                        <span class="badge bg-warning text-dark">Belum dikunjungi</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item text-center">
                            <span class="text-muted">Tidak ada data.</span>
                        </li>
                    </ul>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Kunjungan",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#43A047",
                    data: [50, 45, 22, 28, 50, 60, 76, 40, 90, 10, 11],
                    barThickness: 'flex'
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: '#e5e5e5'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 10,
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                            color: "#737373"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Kuningan", "Banjar", "Ciamis", "Pangandaran"],
                datasets: [{
                    label: "Aspirasi",
                    tension: 0,
                    borderWidth: 2,
                    pointRadius: 3,
                    pointBackgroundColor: "#43A047",
                    pointBorderColor: "transparent",
                    borderColor: "#43A047",
                    backgroundColor: "transparent",
                    fill: true,
                    data: [120, 230, 130, 440],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                const fullMonths = ["January", "February", "March", "April", "May", "June",
                                    "July", "August", "September", "October", "November", "December"
                                ];
                                return fullMonths[context[0].dataIndex];
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [4, 4],
                            color: '#e5e5e5'
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 12,
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 12,
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Tasks",
                    tension: 0,
                    borderWidth: 2,
                    pointRadius: 3,
                    pointBackgroundColor: "#43A047",
                    pointBorderColor: "transparent",
                    borderColor: "#43A047",
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [4, 4],
                            color: '#e5e5e5'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#737373',
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [4, 4]
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        window.addEventListener("load", function() {
            const preloader = document.getElementById("preloader");
            preloader.classList.add("fade-out");
            setTimeout(() => preloader.remove(), 3000);
        });

        // Heat Map
        const data = [];

        const kabupatenList = [{
                id: 'KUN',
                name: 'Kab. Kuningan'
            },
            {
                id: 'CIA',
                name: 'Kab. Ciamis'
            },
            {
                id: 'BAN',
                name: 'Kab. Banjar'
            },
            {
                id: 'PANG',
                name: 'Kab. Pangandaran'
            }
        ];

        let tpsCounter = 1;

        kabupatenList.forEach(kab => {
            data.push({
                id: kab.id,
                name: kab.name
            });

            for (let d = 1; d <= 2; d++) {
                const dapilId = `${kab.id}-D${d}`;
                data.push({
                    id: dapilId,
                    name: `Dapil ${d}`,
                    parent: kab.id
                });

                for (let k = 1; k <= 3; k++) {
                    const kecId = `${dapilId}-Kec${k}`;
                    data.push({
                        id: kecId,
                        name: `Kecamatan ${k}`,
                        parent: dapilId
                    });

                    for (let des = 1; des <= 3; des++) {
                        const desaId = `${kecId}-Desa${des}`;
                        data.push({
                            id: desaId,
                            name: `Desa ${des}`,
                            parent: kecId
                        });

                        for (let tps = 1; tps <= 4; tps++) {
                            const tpsId = `TPS-${String(tpsCounter).padStart(3, '0')}`;
                            data.push({
                                id: tpsId,
                                name: `TPS ${tps}`,
                                parent: desaId,
                                value: Math.floor(Math.random() * 50) + 20 // random value 20–69
                            });
                            tpsCounter++;
                        }
                    }
                }
            }
        });


        Highcharts.chart('container', {
            chart: {
                backgroundColor: 'white',
            },
            series: [{
                type: 'treemap',
                name: 'Heat Map Jabar XIII',
                allowDrillToNode: true,
                interactByLeaf: false,
                layoutAlgorithm: 'sliceAndDice',
                levelIsConstant: false,
                dataLabels: {
                    enabled: false
                },
                levels: [{
                    level: 1, // Kabupaten
                    dataLabels: {
                        enabled: true,
                        align: 'left',
                        verticalAlign: 'top',
                        style: {
                            fontSize: '14px',
                            fontWeight: 'bold'
                        }
                    },
                    colorByPoint: true
                }, {
                    level: 2, // Dapil
                    dataLabels: {
                        enabled: true,
                        align: 'left',
                        verticalAlign: 'top',
                        style: {
                            fontSize: '13px'
                        }
                    }
                }, {
                    level: 3, // Kecamatan
                    dataLabels: {
                        enabled: true,
                        align: 'left',
                        verticalAlign: 'top',
                        style: {
                            fontSize: '12px'
                        }
                    }
                }, {
                    level: 4, // Desa
                    dataLabels: {
                        enabled: true,
                        align: 'left',
                        verticalAlign: 'top',
                        style: {
                            fontSize: '11px'
                        }
                    }
                }, {
                    level: 5, // TPS
                    dataLabels: {
                        enabled: true,
                        align: 'left',
                        verticalAlign: 'top',
                        style: {
                            fontSize: '10px'
                        }
                    }
                }],
                data: data
            }],
            title: {
                text: 'Heat Map Pemilu Jabar XIII',
                style: {
                    color: 'black'
                }
            },
            subtitle: {
                text: 'Source: KPU Indonesia',
                align: 'left'
            }
        });
    </script>
@endsection
