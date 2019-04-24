<nav class="sidebar sidebar-offcanvas" id="sidebar">
    @hasanyrole('Admin|Manager|Employee')
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
            <i class="menu-icon mdi mdi-television"></i>
            <span class="menu-title">Trang chủ</span>
            </a>
        </li>
        @if(auth()->user()->type == 0 || auth()->user()->type == 1  )
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#buildings" aria-expanded="false" aria-controls="buildings">
            <i class="menu-icon mdi mdi-hospital-building"></i>
            <span class="menu-title">Tòa nhà</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="buildings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('buildings.index')}}">Danh Sách toà nhà</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('buildings.create')}}">Thêm mới</a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#apartments" aria-expanded="false" aria-controls="apartments">
            <i class="menu-icon mdi mdi-home-modern"></i>
            <span class="menu-title">Căn hộ</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="apartments">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('apartments.index')}}">Danh Sách căn hộ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('apartments.create')}}">Thêm mới</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#residents" aria-expanded="false" aria-controls="residents">
            <i class="menu-icon mdi mdi-account-multiple-outline"></i>
            <span class="menu-title">Cư dân</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="residents">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('residents.index')}}">Danh sách cư dân</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('residents.create')}}">Thêm mới</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#employees" aria-expanded="false" aria-controls="employees">
            <i class="menu-icon mdi mdi-account-network"></i>
            <span class="menu-title">Nhân viên</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="employees">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('employees.index')}}">Danh sách nhân viên</a>
                    </li>
                    @if(auth()->user()->type == 0 || auth()->user()->type == 1  )
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('employees.create')}}">Thêm mới</a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#services" aria-expanded="false" aria-controls="services">
            <i class="menu-icon mdi mdi-briefcase-check"></i>
            <span class="menu-title">Dịch vụ</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="services">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('services.index')}}">Danh sách dịch vụ</a>
                    </li>
                    @if(auth()->user()->type == 0 || auth()->user()->type == 1  )
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('services.create')}}">Thêm mới</a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#devices" aria-expanded="false" aria-controls="devices">
            <i class="menu-icon mdi mdi-webcam"></i>
            <span class="menu-title">Thiết bị chung</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="devices">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('devices.index')}}">Danh sách thiết bị</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('devices.create')}}">Thêm mới</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#maintenances" aria-expanded="false" aria-controls="maintenances">
            <i class="menu-icon mdi mdi-run"></i>
            <span class="menu-title">Nghiệp vụ</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="maintenances">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('maintenances.index')}}">Danh sách nghiệp vụ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('maintenances.create')}}">Thêm mới</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="reports">
            <i class="menu-icon mdi mdi-calendar-text"></i>
            <span class="menu-title">Báo cáo</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="reports">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('reports.index')}}">Danh sách báo cáo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('reports.create')}}">Thêm mới</a>
                    </li>
                </ul>
            </div>
        </li>
        @hasanyrole('Admin|Manager')
        <li class="nav-item">
            <a class="nav-link"href="{{ route('users.index') }}">
                <span class="menu-title">Quản lý Tài khoản</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link"href="{{ route('data-statistics.index') }}">
                <span class="menu-title">Thống kê</span>
            </a>
        </li>
        @endhasanyrole
        @role('Admin')
        <li class="nav-item">
            <a class="nav-link"href="{{ route('roles.index') }}">
            <span class="menu-title">Quản lý phân quyền</span>
            </a>
        </li>
        @endrole
    </ul>
    @else
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('residents.infomation') }}">
            <i class="menu-icon mdi mdi-television"></i>
            <span class="menu-title">Trang cá nhân</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('residents.report-index') }}">
            <i class="menu-icon  mdi mdi-hospital-building"></i>
            <span class="menu-title">Báo cáo với ban quản lý</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('residents.service-index')}}">
            <i class="menu-icon mdi mdi-briefcase-check"></i>
            <span class="menu-title">Các dịch vụ của tòa nhà</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('residents.cost-service-index')}}">
            <i class="menu-icon mdi mdi-calendar-text"></i>
            <span class="menu-title">Chi tiết hóa đơn theo tháng</span>
            </a>
        </li>
    </ul>
    @endhasanyrole

</nav>