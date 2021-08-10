<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">Perpustakaan Diskominfo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @foreach((request()->segments()[0] == 'admin' ? config('adminlte.admin_sidebar') : config('adminlte.user_sidebar')) as $menu)
                <li class="nav-item">
                    <a href="{{ URL($menu['href']) }}" class="nav-link {{ request()->routeIs($menu['active']) ? 'active' : '' }}">
                        <i class="nav-icon {{ $menu['icon'] }}"></i>
                        <p>
                            {{ $menu['title'] }}
                        </p>
                    </a>
                </li>
               @endforeach
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>