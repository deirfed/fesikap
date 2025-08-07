<nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                @yield('page-name')
            </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav d-flex align-items-center justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="{{ route('dashboard.index') }}" class="nav-link text-body p-0">
                        <i class="material-symbols-rounded fixed-plugin-button-nav">home</i>
                    </a>
                </li>
                <li class="nav-item d-flex px-3 align-items-center">
                    <a href="{{ route('navigasi.index') }}" class="nav-link text-body p-0">
                        <i class="material-symbols-rounded fixed-plugin-button-nav">settings</i>
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a href="{{ route('informasi.index') }}" class="nav-link text-body font-weight-bold px-0">
                        <i class="material-symbols-rounded">info</i>
                    </a>
                </li>

                <li class="nav-item d-flex px-3 align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" data-bs-toggle="modal"
                        data-bs-target="#logoutModal">
                        <i class="material-symbols-rounded fixed-plugin-button-nav">logout</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                Apakah kamu yakin ingin logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Ya, Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
