<nav class="navbar {{ auth()->user()->type == 3 ? 'navbar-warning' : ''}} default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" style="color:#1396f9;" href="{{ route('home') }}">
         Building Care</a>
        <a class="navbar-brand brand-logo-mini" >
        <img src="../../../assets/images/logo-mini.svg" alt="logo" /> </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-xl-inline-block">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="../../../assets/images/faces/face8.jpg" alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    @if(auth()->user()->type == 0)

                    @elseif(auth()->user()->type == 3)
                        <a class="dropdown-item mt-2" href="{{ route('residents.infomation') }}"> Thông tin cá nhân</a>
                    @else
                        <a class="dropdown-item mt-2" href="{{ route('employee.infomation') }}"> Thông tin cá nhân</a>
                    @endif
                    <a class="dropdown-item {{auth()->user()->type == 0 ?'mt-2' : ''}}" href="{{route('getChangePassword')}}"> @if(auth()->user()->type != 0) Thay đổi mật khẩu @endif </a>
                    <a class="dropdown-item"  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> Đăng xuất </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
        </button>
    </div>
</nav>