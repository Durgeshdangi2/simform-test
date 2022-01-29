<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="material-icons">menu</i>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img
                    src="{{ asset('assets/img/logo/logo-round.png')  }}"
                    alt="{{ config('app.name') }}"
                    width="25"
                    class="img-circle">
                {{--                <i class="material-icons md-dark">account_circle</i>--}}
                <span class="d-none d-md-inline">{{ optional(auth()->user())->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-gradient-danger">
                    <p>
                        {{  optional(auth()->user())->first_name }} - {{  optional(auth()->user())->last_name }}
                        <small class="hide"></small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                       class="btn {{ config('ws_theme.default.logout_btn_class') }} float-right">{{__('common.sign_out')}}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
