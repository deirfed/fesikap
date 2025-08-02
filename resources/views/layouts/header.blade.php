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
                    <a href="{{ route('main-dashboard') }}" class="nav-link text-body p-0">
                        <i class="material-symbols-rounded fixed-plugin-button-nav">home</i>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="{{ route('admin') }}" class="nav-link text-body p-0">
                        <i class="material-symbols-rounded fixed-plugin-button-nav">Dashboard</i>
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <i class="material-symbols-rounded fixed-plugin-button-nav">Settings</i>
                    </a>
                </li>
                <li class="nav-item d-flex px-3 align-items-center">
                    <a href="{{ route('profile') }}" class="nav-link text-body font-weight-bold px-0">
                        <i class="material-symbols-rounded">account_circle</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
