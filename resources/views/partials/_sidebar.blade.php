<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <img src="{{ asset('img/NS2.png') }}" width="50" height="50" alt="Logo Ngudosuko">
        <div class="sidebar-brand-text" style="margin-left: auto; margin-right:1rem;">Ngudosuko</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Layanan
    </div>

    <li class="nav-item {{ Request::is('ajukan-keluhan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('ajukan.keluhan') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Keluhan</span></a>
    </li>

    <li class="nav-item {{ Request::is('ajukan-usulan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('ajukan.usulan') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Usulan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Monitoring
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('keluhan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('keluhan.user') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Tindak Lanjut Keluhan</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link {{ Request::is('usulan*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
            data-target="#collapseUsulan" aria-expanded="true" aria-controls="collapseUsulan">
            <i class="fas fa-fw fa-table"></i>
            <span>Tindak Lanjut Usulan</span>
        </a>
        <div id="collapseUsulan" class="collapse {{ Request::is('usulan*') ? 'show' : '' }}"
            aria-labelledby="headingUsulan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('usulan/all') ? 'active' : '' }}"
                    href="{{ route('usulan.all') }}">Semua</a>
                <a class="collapse-item {{ Request::is('usulan/pengguna') ? 'active' : '' }} "
                    href="{{ route('usulan.user') }}">Hanya Milik Pengguna</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
