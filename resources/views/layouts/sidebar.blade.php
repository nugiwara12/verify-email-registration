<link rel="stylesheet" href="{{ asset('admin_assets/css/sidebar-icon.css') }}">

@auth
<ul class="navbar-nav sidebar" style="background: linear-gradient(180deg, #ac0707 10%, #690b1f 100%)"
    id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon">
            <img class="logo" src="{{url('admin_assets/logo/books-logo.png')}}" alt="logo">
        </div>
        <div class="sidebar-brand-text mx-3"><sup></sup></div>
    </a><br>

    <!-- Divider -->
    <br>
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard  General View-->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-window"
                viewBox="0 0 16 16">
                <path
                    d="M2.5 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m1 .5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                <path
                    d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm13 2v2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1M2 14a1 1 0 0 1-1-1V6h14v7a1 1 0 0 1-1 1z" />
            </svg>
            <span class="sidebar-icon" style="color:#FFFFFF" data-toggle="tooltip" data-placement="top"
                title="Dashboard">Dashboard</span></a>
    </li>



    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-person"
                viewBox="0 0 16 16">
                <path
                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z" />
            </svg>
            <span class="sidebar-icon" style="color:#FFFFFF" data-toggle="tooltip" data-placement="top"
                title="Table Name">Table Name</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <!-- <a class="collapse-item" href="{{ route('users') }}">Chat Box</a> -->
                <a class="collapse-item" href="{{ route('usermanagement') }}" data-toggle="tooltip" data-placement="top"
                    title="User Management">User <br> Management</a>
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


@endauth