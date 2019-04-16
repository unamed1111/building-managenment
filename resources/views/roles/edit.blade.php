@extends('layouts.master')
{{-- @section('title', 'Quản lý quyền') --}}
@section('content')

   <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card card-header">
                    <div class="card-header with-border">
                        <h3 class="card-title">Chỉnh sửa quyền</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                       @include('partials.alert')
                    {!! Form::open(['method' => 'PUT', 'route' => ['role.update', $role->id], 'class' => 'validate']) !!}
                        <div class="row">
                            <div class="col-md-4">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Tên(*)</label>
                                    <input name="name" type="text" value="{{$role->name}}" class="form-control" placeholder="Nhập vào tên quyền" required>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-12">
                                <h4>Chọn quyền hạn</h4>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                    <?php
                                        $arr = [];
                                    ?>
                                    <div class="col-md-3">
                                        <section>
                                            <label>{{ $permission['name'] }}</label>
                                            <div class="form-group">
                                            @foreach ($permission['actions'] as $action)
                                                @if (!in_array($action["id"], $arr))
                                                    <?php
                                                        array_push($arr, $action["id"]);
                                                    ?>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="permissions[]" class="minimal" value="{{$action['id']}}" {{ in_array($action['id'], $role_permissions) ? 'checked' : '' }}>
                                                            {{ $action["name"] }}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                            </div>
                                        </section>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="box-footer">
                        <a href="/role" class="btn btn-default pull-right">Hủy</a>
                        {!! Form::button('Cập nhật', ['class' => 'btn btn-primary pull-left', 'type' => "submit"]) !!}
                    </div>
                    {!! Form::close() !!}
                    <div class="overlay hide">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
