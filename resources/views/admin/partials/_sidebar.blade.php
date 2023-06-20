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
    <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Layanan
    </div>

    <li class="nav-item {{ Request::is('admin/keluhan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.complaint.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Cek Keluhan</span></a>
    </li>

    <li class="nav-item {{ Request::is('admin/usulan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.recommendation.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Cek Usulan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
