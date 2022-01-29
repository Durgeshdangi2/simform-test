<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom  elevation-4 sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="{{ Auth::check() ? url('/home') : url('/') }}" class="brand-link navbar-white">
        <img
            src="{{ asset('assets/img/logo/logo-round.png')  }}"
            alt="{{ config('app.name') }} Logo"
            class="brand-image img-circle elevation-2">
        <span
            class="brand-text font-weight-bold">
            {{ \Illuminate\Support\Str::replaceFirst('A', '', config('app.name')) }}
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            {{--                <li class="header text-center mb-3">{{__('common.main_navigation')}}</li>--}}
            <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                       class="nav-link {{ request()->is('home*') ? config('ws_theme.default.menu_class') : ''}}">
                        <i class="nav-icon material-icons">home</i>
                        <p>{{__('common.dashboard')}}</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <div class="sidebar-custom">
        @if(auth()->user()->can('settings_manage'))
            <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a>
        @endif
        @if(auth()->user()->can('profile_manage'))
            <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Profile</a>
        @endif
    </div>
</aside>
