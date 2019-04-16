@extends('layouts.master')
{{-- @section('title', 'Quản lý quyền') --}}
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                @include('partials.alert')
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                {!! Form::open(['method' => 'POST', 'route' => ['role.store'], 'class' => 'validate']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Tên(*)</label>
                                <input name="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="Nhập vào tên quyền" required>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Chọn quyền hạn</h4>
                        </div>
                            <!-- /.form-group -->
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
                                                    <input type="checkbox" name="permissions[]" class="minimal" value="{{$action['id']}}" {{ old('permissions') !== null && in_array($arr, old('permissions')) ? 'checked' : '' }}>
                                                    {{ $action["name"] }}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                    </div>
                                </section>
                            </div>
                            @endforeach
                            <!-- /.form-group -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="card-footer">
                    <a href="/admin/role" class="btn btn-default pull-right">Hủy</a>
                    {!! Form::button('Thêm mới', ['class' => 'btn btn-primary pull-left', 'type' => "submit"]) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
