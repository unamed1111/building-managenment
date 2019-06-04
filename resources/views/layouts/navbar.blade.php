<nav class="navbar {{ auth()->user()->type == 3 ? 'navbar-warning' : ''}} default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" style="color:#1396f9;" href="{{ auth()->user()->type == 3 ? route('residents.infomation') : route('home') }}">
         Building Care</a>
        <a class="navbar-brand brand-logo-mini" >
        <img src="../../../assets/images/logo-mini.svg" alt="logo" /> </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown ml-4">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count bg-success">{{auth()->user()->unreadNotifications->count()}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown" style="overflow-y: auto; max-height: 400px;">
                    <a class="dropdown-item py-3 border-bottom">
                        <p class="mb-0 font-weight-medium float-left">Bạn có  {{auth()->user()->unreadNotifications->count()}} Thông báo mới</p>
                        <span style="cursor: pointer;" class="badge badge-pill badge-primary float-right markreadAll" data-url="{{ route('markAllNoti') }}">Đánh dấu đã đọc hết</span>
                    </a>
                    @foreach(auth()->user()->unreadNotifications as $notification)
                    @if(auth()->user()->type == 1)
                    <a style="cursor: pointer;" class="dropdown-item preview-item py-3 noti" data-url="{{ route('readNoti', $notification->id) }}" >
                        <div class="preview-thumbnail">
                            <i class="mdi mdi-alert m-auto text-primary"></i>
                        </div>
                        @if($notification->type == 'App\Notifications\PaymentNotification')
                            <div class="preview-item-content content-noti" data-next="">
                                <h6 class="preview-subject font-weight-normal text-dark mb-1">{{ 'Căn hộ '. $notification->data['apartment'] . ' đã đóng phí dịch vụ: '. number_format($notification->data['amount']) .' vnđ'  }}</h6>
                                <p class="font-weight-light small-text mb-0"> {{ PAY_STATUS[$notification->data['status']] }} </p> 
                            </div>
                        @else
                            <div class="preview-item-content content-noti" data-next="{{ route('reports.show', $notification->data['report_id']) }}">
                                <h6 class="preview-subject font-weight-normal text-dark mb-1">{{ $notification->data['title']}}</h6>
                                <p class="font-weight-light small-text mb-0"> {{ $notification->data['user']}}   </p> 
                            </div>
                        @endif
                    </a>
                    @elseif(auth()->user()->type == 2 || auth()->user()->type == 3)
                    <a style="cursor: pointer;" class="dropdown-item preview-item py-3 noti" data-url="{{ route('readNoti', $notification->id) }}" >
                        <div class="preview-thumbnail">
                            <i class="mdi mdi-alert m-auto text-primary"></i>
                        </div>
                        @if($notification->type == 'App\Notifications\PaymentNotification')
                            <div class="preview-item-content content-noti" data-next="{{ auth()->user()->type == 3 ? route('residents.cost-service-index') : route('home')  }}">
                                <h6 class="preview-subject font-weight-normal text-dark mb-1">{{ $notification->data['message'] . ' - Ban quản lý' }}</h6>
                                <p class="font-weight-light small-text mb-0"> {{ PAY_STATUS[$notification->data['status']] }} </p> 
                            </div>
                        @elseif($notification->type == 'App\Notifications\RegisterServiceNotification')
                            <div class="preview-item-content content-noti" data-next="{{ url()->current() }}">
                                <h6 class="preview-subject font-weight-normal text-dark mb-1">{{ 'Bạn vừa đăng kí dịch vụ: '. $notification->data['name'] . ' - với giá: ' . number_format($notification->data['cost']) .' vnđ'}}</h6>
                                <p class="font-weight-light small-text mb-0"> {{ ' Từ Ban Quản lý' }} </p> 
                            </div>
                        @elseif($notification->type == 'App\Notifications\ServiceFeeNotification')
                            <div class="preview-item-content content-noti" data-next="{{ route('residents.cost-service-show',$notification->data['month']) }}">
                                <h6 class="preview-subject font-weight-normal text-dark mb-1">{{ $notification->data['noti_name'] }}</h6>
                                <p class="font-weight-light small-text mb-0"> {{ ' Từ Ban Quản lý' }} </p> 
                            </div>
                        @else
                            <div class="preview-item-content content-noti" data-next="{{ auth()->user()->type == 2 ? route('reports.show', $notification->data['report_id']) : route('residents.report-index')  }}">
                                <h6 class="preview-subject font-weight-normal text-dark mb-1">{{ $notification->data['title'] . ' - ' . REPORT_STATUS[$notification->data['status']]}}</h6>
                                <p class="font-weight-light small-text mb-0"> {{ 'Ban Quản lý' }} </p> 
                            </div>
                        @endif
                    </a>
                    @endif
                    @endforeach
{{--                     <a class="dropdown-item preview-item py-3">
                        <div class="preview-thumbnail">
                            <i class="mdi mdi-settings m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal text-dark mb-1">Settings</h6>
                            <p class="font-weight-light small-text mb-0"> Private message </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item py-3">
                        <div class="preview-thumbnail">
                            <i class="mdi mdi-airballoon m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal text-dark mb-1">New user registration</h6>
                            <p class="font-weight-light small-text mb-0"> 2 days ago </p>
                        </div>
                    </a> --}}
                </div>
            </li>
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

@push('js')
    <script>
        $(document).on('click', '.noti', function(event) {
            event.preventDefault();
            url = $(this).data('url');
            next = $(this).find('.content-noti').data('next');
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
            })
            .done(function(response) {
                window.location.href = next;
            })
            .fail(function() {
                console.log("error");
            })
        });

        $(document).on('click', '.markreadAll', function(event) {
            event.preventDefault();
            url = $(this).data('url');
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
            })
            .done(function() {
                window.location.reload(true);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
        });
    </script>


@endpush