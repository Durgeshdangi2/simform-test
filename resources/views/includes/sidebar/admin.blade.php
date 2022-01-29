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

                <!-- <li class="nav-header font-italic">{{__('common.modules')}}</li>
                @if(auth()->user()->can('services_read'))
                    <li class="nav-item">
                        <a href="{{route(config('ws_routes.prefix.admin') . '.services.index')}}"
                           class="nav-link {{ request()->is(config('ws_routes.prefix.admin') . '/services*') ? config('ws_theme.default.menu_class') : ''}}">
                            <i class="nav-icon material-icons">local_mall</i>
                            <p>{{__('common.services')}}</p>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->can('vendors_read'))
                    <li class="nav-item">
                        <a href="{{route(config('ws_routes.prefix.admin') . '.vendors.index')}}"
                           class="nav-link {{ request()->is(config('ws_routes.prefix.admin') . '/vendors*') ? config('ws_theme.default.menu_class') : ''}}">
                            <i class="nav-icon material-icons">corporate_fare</i>
                            <p>{{__('common.vendors')}}</p>
                        </a>
                    </li>
                @endif
                <li class="nav-header font-italic">{{__('common.management')}}</li>
                @if(auth()->user()->can('faqs_read'))
                    <li class="nav-item">
                        <a href="{{route(config('ws_routes.prefix.admin') . '.faqs.index')}}"
                           class="nav-link {{ request()->is('admin/faqs*') ? config('ws_theme.default.menu_class') : ''}}">
                            <i class="nav-icon material-icons">help</i>
                            <p>{{__('common.faqs')}}</p>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->can('sliders_read'))
                    <li class="nav-item">
                        <a href="{{route(config('ws_routes.prefix.admin') . '.sliders.index')}}"
                           class="nav-link {{ request()->is('admin/sliders*') ? config('ws_theme.default.menu_class') : ''}}">
                            <i class="nav-icon material-icons">linear_scale</i>
                            <p>{{__('common.sliders')}}</p>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->can('banners_read'))
                    <li class="nav-item">
                        <a href="{{route(config('ws_routes.prefix.admin') . '.banners.index')}}"
                           class="nav-link {{ request()->is('admin/banners*') ? config('ws_theme.default.menu_class') : ''}}">
                            <i class="nav-icon material-icons">view_carousel</i>
                            <p>{{__('common.banners')}}</p>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->can('cms_read'))
                    <li class="nav-item">
                        <a href="{{route(config('ws_routes.prefix.admin') . '.cms.index')}}"
                           class="nav-link {{ request()->is('admin/cms*') ? config('ws_theme.default.menu_class') : ''}}">
                            <i class="nav-icon material-icons">pages</i>
                            <p>{{__('common.cms')}}</p>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->can('categories_read'))
                    <li class="nav-item">
                        <a href="{{route(config('ws_routes.prefix.admin') . '.categories.index')}}"
                           class="nav-link {{ request()->is(config('ws_routes.prefix.admin') . '/categories*') ? config('ws_theme.default.menu_class') : ''}}">
                            <i class="nav-icon material-icons">category</i>
                            <p>{{__('common.categories')}}</p>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->can('countries_read'))
                    <li class="nav-item">
                        <a href="{{route(config('ws_routes.prefix.admin') . '.countries.index')}}"
                           class="nav-link {{ request()->is(config('ws_routes.prefix.admin') . '/countries*') ? config('ws_theme.default.menu_class') : ''}}">
                            <i class="nav-icon material-icons">emoji_flags</i>
                            <p>{{__('common.countries')}}</p>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->can('languages_read'))
                    <li class="nav-item">
                        <a href="{{route(config('ws_routes.prefix.admin') . '.languages.index')}}"
                           class="nav-link {{ request()->is(config('ws_routes.prefix.admin') . '/languages*') ? config('ws_theme.default.menu_class') : ''}}">
                            <i class="nav-icon material-icons">language</i>
                            <p>{{__('common.languages')}}</p>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->can('currencies_read'))
                    <li class="nav-item">
                        <a href="{{route(config('ws_routes.prefix.admin') . '.currencies.index')}}"
                           class="nav-link {{ request()->is(config('ws_routes.prefix.admin') . '/currencies*') ? config('ws_theme.default.menu_class') : ''}}">
                            <i class="nav-icon material-icons">monetization_on</i>
                            <p>{{__('common.currencies')}}</p>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->can('users_read') || auth()->user()->can('super_admin_manage'))
                    <li class="nav-item">
                        <a href="{{route(config('ws_routes.prefix.admin') . '.users.index')}}"
                           class="nav-link {{ request()->is(config('ws_routes.prefix.admin') . '/users*') ? config('ws_theme.default.menu_class') : ''}}">
                            <i class="nav-icon material-icons">admin_panel_settings</i>
                            <p>{{__('common.users')}}</p>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->can('roles_read') || auth()->user()->can('super_admin_manage'))
                    <li class="nav-item">
                        <a href="{{route(config('ws_routes.prefix.admin') . '.roles.index')}}"
                           class="nav-link {{ request()->is(config('ws_routes.prefix.admin') . '/roles*') ? config('ws_theme.default.menu_class') : ''}}">
                            <i class="nav-icon material-icons">room_preferences</i>
                            <p>{{__('common.roles_permissions')}}</p>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->can('activities_read') || auth()->user()->can('super_admin_manage'))
                    <li class="nav-item">
                        <a href="{{route(config('ws_routes.prefix.admin') . '.activities.index')}}"
                           class="nav-link {{ request()->is(config('ws_routes.prefix.admin') . '/activities*') ? config('ws_theme.default.menu_class') : ''}}">
                            <i class="nav-icon material-icons">local_activity</i>
                            <p>{{__('common.activities')}}</p>
                        </a>
                    </li>
                @endif -->

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <div class="sidebar-custom">
        @if(auth()->user()->can('settings_manage'))
            <a href="{{ route(config('ws_routes.prefix.admin') .'.settings.manage', 'general') }}" class="btn btn-link"><i
                    class="fas fa-cogs"></i></a>
        @endif
        @if(auth()->user()->can('profile_manage'))
            <a href="{{ route('profile.manage') }}" class="btn btn-secondary hide-on-collapse pos-right">Profile</a>
        @endif
    </div>
</aside>
