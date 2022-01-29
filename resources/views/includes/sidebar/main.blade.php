<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom  elevation-4 sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="{{ Auth::check() ? url('/home') : url('/') }}" class="brand-link navbar-white">
        <img
            src="{{ asset('assets/img/logo/logo-round.png')  }}"
            alt="{{ config('app.name') }} Logo"
            class="brand-image img-circle elevation-2">
        <span class="brand-text font-weight-bold">
            {{ \Illuminate\Support\Str::replaceFirst('A', '', config('app.name')) }}
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                       class="nav-link {{ request()->is('home*') ? 'bg-gradient-info' : ''}}">
                        <i class="nav-icon material-icons">home</i>
                        <p>{{__('common.dashboard')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.index')}}"
                       class="nav-link {{ request()->is('users*') ? 'bg-gradient-info' : ''}}">
                        <i class="nav-icon material-icons">person</i>
                        <p>{{__('common.users')}}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('expense-management.index')}}"
                       class="nav-link {{ request()->is('expense-management*') ? 'bg-gradient-info' : ''}}">
                        <i class="nav-icon material-icons">category</i>
                        <p>{{__('common.expense-management')}}</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
