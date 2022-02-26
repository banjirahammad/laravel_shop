<header class="topbar topbar-inverse gb-dark" id="topbar-colors">
    <div class="topbar-left">
        <span class="topbar-btn sidebar-toggler" style="color:white;"><i>☰</i></span>





        <div class="dropdown d-none d-md-block">
{{--            <h3 style="color:white;text-align:center; font-weight:bold; display:inline-block;">POS Software</h3>--}}
{{--            <p style="color:white; margin-left:15px; font-size:1.2em;display:inline-block; display:inline-block;">For Support: 01786-878393 (10 AM - 06 PM)</p>--}}

        </div>


        <di class="topbar-divider d-none d-md-block"></di>
    </div>

    <div class="topbar-right">
        <a class="topbar-btn" href="#" data-toggle="test"><i class="ti-align-right"></i></a>

        <div class="topbar-divider"></div>

        <ul class="topbar-btns">
            <li class="dropdown">
                <span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="{{ auth()->user()->photo != null ? asset('upload/users/'.auth()->user()->photo) : asset('upload/users/not-available.png') }}" alt="avater"></span>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="back/profile"><i class="ti-user"></i> Profile</a>

                    <a class="dropdown-item" href="back/pos-setting"><i class="ti-settings"></i> Settings</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="ti-power-off"></i> Logout</a>
                </div>
            </li>

            <!-- Notifications -->

            <!-- END Notifications -->

            <!-- Messages -->

            <!-- END Messages -->

        </ul>

        <div class="topbar-divider"></div>
    </div>
</header>
