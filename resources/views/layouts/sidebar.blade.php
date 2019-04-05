<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <div class="nav-link">
                <div class="user-wrapper">
                  <div class="profile-image">
                    <img src="../../../assets/images/faces/face8.jpg" alt="profile image"> </div>
                  <div class="text-wrapper">
                    <p class="profile-name">
                      @if(isset(auth()->user()->userable->name))
                        {{auth()->user()->userable->name}}
                      @else
                        {{'Admin'}}
                      @endif
                    </p>
                    <div>
                      <small class="designation text-muted">{{ACCOUNT_TYPE[auth()->user()->type]}}</small>
                      <span class="status-indicator online"></span>
                    </div>
                  </div>
                </div>
                <button class="btn btn-success btn-block">New Project
                  <i class="mdi mdi-plus"></i>
                </button>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#dashboard-dropdown" aria-expanded="false" aria-controls="dashboard-dropdown">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="dashboard-dropdown">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="../../index.html">Dashboard 1</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/dashboards/dashboard-2.html">Dashboard 2</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#buildings" aria-expanded="false" aria-controls="buildings">
                <i class="menu-icon mdi mdi-notification-clear-all"></i>
                <span class="menu-title">Tòa nhà</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="buildings">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('buildings.index')}}">Danh Sách toàn nhà</a>
                  </li>
                </ul>
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('buildings.create')}}">Thêm mới</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#apartments" aria-expanded="false" aria-controls="apartments">
                <i class="menu-icon mdi mdi-notification-clear-all"></i>
                <span class="menu-title">Căn hộ</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="apartments">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('apartments.index')}}">Danh Sách căn hộ</a>
                  </li>
                </ul>
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('apartments.create')}}">Thêm mới</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#apartment_owners" aria-expanded="false" aria-controls="apartment_owners">
                <i class="menu-icon mdi mdi-notification-clear-all"></i>
                <span class="menu-title">Chủ căn hộ</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="apartment_owners">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('apartment_owners.index')}}">Danh sách chủ nhà</a>
                  </li>
                </ul>
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('apartment_owners.create')}}">Thêm mới</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#residents" aria-expanded="false" aria-controls="residents">
                <i class="menu-icon mdi mdi-notification-clear-all"></i>
                <span class="menu-title">Cư dân</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="residents">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('residents.index')}}">Danh sách cư dân</a>
                  </li>
                </ul>
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('residents.create')}}">Thêm mới</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#employees" aria-expanded="false" aria-controls="employees">
                <i class="menu-icon mdi mdi-notification-clear-all"></i>
                <span class="menu-title">Nhân viên</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="employees">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('employees.index')}}">Danh sách nhân viên</a>
                  </li>
                </ul>
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('employees.create')}}">Thêm mới</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#services" aria-expanded="false" aria-controls="services">
                <i class="menu-icon mdi mdi-notification-clear-all"></i>
                <span class="menu-title">Dịch vụ</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="services">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('services.index')}}">Danh sách dịch vụ</a>
                  </li>
                </ul>
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('services.create')}}">Thêm mới</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#devices" aria-expanded="false" aria-controls="devices">
                <i class="menu-icon mdi mdi-notification-clear-all"></i>
                <span class="menu-title">Tài sản</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="devices">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('devices.index')}}">Danh sách thiết bị</a>
                  </li>
                </ul>
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('devices.create')}}">Thêm mới</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#maintenances" aria-expanded="false" aria-controls="maintenances">
                <i class="menu-icon mdi mdi-notification-clear-all"></i>
                <span class="menu-title">Nghiệp vụ</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="maintenances">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('maintenances.index')}}">Danh sách nghiệp vụ</a>
                  </li>
                </ul>
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('maintenances.create')}}">Thêm mới</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="reports">
                <i class="menu-icon mdi mdi-notification-clear-all"></i>
                <span class="menu-title">Báo cáo</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="reports">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('reports.index')}}">Danh sách báo cáo</a>
                  </li>
                </ul>
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('reports.create')}}">Thêm mới</a>
                  </li>
                </ul>
              </div>
            </li>

          </ul>
        </nav>